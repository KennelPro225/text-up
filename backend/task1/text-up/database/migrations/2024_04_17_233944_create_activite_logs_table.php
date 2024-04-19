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

        DB::unprepared("
            CREATE TRIGGER log_post_updates
            AFTER UPDATE ON posts
            FOR EACH ROW
            BEGIN
            INSERT INTO activite_logs (`table`, `action`, `old`, `new`, `created_at`)
            VALUES ('posts', 'update', JSON_OBJECT('data', OLD.texte), JSON_OBJECT('data', NEW.texte), NOW());
            END
            "
        );
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
