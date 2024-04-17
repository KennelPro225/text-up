<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// class CreateLOGSTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         $tableNames = [
//             "categories",
//             "produits",
//             "commandes",
//         ];

//         foreach($tableNames as $table)
//         {
//             DB::statement("
//             CREATE OR REPLACE TRIGGER {$table}_insert
//             AFTER INSERT ON {$table}
//             FOR EACH ROW
//             BEGIN
//             -- Log INSERT operation
//             INSERT INTO activite_logs (table, action, old_value, new_value)
//             VALUES ($table, 'INSERT', NULL, :NEW);
//             END;
//             ");

//             DB::statement("
//             CREATE OR REPLACE TRIGGER {$table}_update
//             AFTER UPDATE ON {$table}
//             FOR EACH ROW
//             BEGIN
//             -- Log update operation
//             INSERT INTO activite_logs (table, action, old_value, new_value)
//             VALUES ($table, 'UPDATE', :OLD, :NEW);
//             END;
//             ");
//         }
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('l_o_g_s');
//     }
// }
