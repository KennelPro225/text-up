<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateActiviteLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activite_logs', function (Blueprint $table) {
            $table->id();
            $table->string("table");
            $table->string("action");
            $table->string("old")->nullable();
            $table->string("new");
            $table->timestamps();
        });

        DB::table('activite_logs')->statement("
        CREATE TRIGGER posts_after_insert
        AFTER INSERT ON posts
        FOR EACH ROW
        BEGIN
            INSERT INTO activite_log (table_name, action, old_value, new_value)
            VALUES ('posts', 'INSERT', NULL, CONCAT('Le titre du nouvel article est : ', NEW.title));
        END;

        CREATE TRIGGER posts_after_update
        AFTER UPDATE ON posts
        FOR EACH ROW
        BEGIN
            INSERT INTO activite_log (table_name, action, old_value, new_value)
            VALUES ('posts', 'UPDATE', CONCAT('Ancienne valeur : ', OLD.title), CONCAT('Mise à jour faite : ', NEW.title));
        END;

        CREATE TRIGGER posts_after_delete
        AFTER DELETE ON posts
        FOR EACH ROW
        BEGIN
            INSERT INTO activite_log (table_name, action, old_value, new_value)
            VALUES ('posts', 'DELETE', CONCAT('Client supprimé : ', OLD.Nom, ' ', OLD.Prénom), NULL);
        END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activite_logs');
    }
}
