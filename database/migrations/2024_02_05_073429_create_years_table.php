<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('years', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('DB_USER_id')->nullable(); // Reference a user (principal)
            $table->string('LG_USER_name_last', 50)->nullable(); // Preserve or force (principal)
            $table->string('LG_USER_name_first', 50)->nullable(); // Preserve or force (principal)

            $table->smallInteger('year')->unique();
            $table->string('full', 50);

            $table->tinyInteger('attendance_jan_t')->nullable();
            $table->tinyInteger('attendance_feb_t')->nullable();
            $table->tinyInteger('attendance_mar_t')->nullable();
            $table->tinyInteger('attendance_apr_t')->nullable();
            $table->tinyInteger('attendance_may_t')->nullable();
            $table->tinyInteger('attendance_jun_t')->nullable();
            $table->tinyInteger('attendance_jul_t')->nullable();
            $table->tinyInteger('attendance_aug_t')->nullable();
            $table->tinyInteger('attendance_sep_t')->nullable();
            $table->tinyInteger('attendance_oct_t')->nullable();
            $table->tinyInteger('attendance_nov_t')->nullable();
            $table->tinyInteger('attendance_dec_t')->nullable();
        });
    }
    public function down () : void { Schema::dropIfExists('years'); }
};
