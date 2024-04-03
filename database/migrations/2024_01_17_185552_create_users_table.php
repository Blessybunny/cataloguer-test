<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyInteger('DB_GRADE_id')->nullable(); // Reference a grade (grade level coordinators)
            $table->tinyInteger('DB_ROLE_id'); // Reference a role
            $table->tinyInteger('DB_YEAR_id')->nullable(); // Reference a year

            $table->string('email', 50)->unique();
            $table->string('password');

            $table->string('name_last', 50);
            $table->string('name_first', 50);

            $table->boolean('ST_subject_fil')->default(0); // Setting
            $table->boolean('ST_subject_eng')->default(0); // Setting
            $table->boolean('ST_subject_mat')->default(0); // Setting
            $table->boolean('ST_subject_sci')->default(0); // Setting
            $table->boolean('ST_subject_ap')->default(0); // Setting
            $table->boolean('ST_subject_ep')->default(0); // Setting
            $table->boolean('ST_subject_tle')->default(0); // Setting
            $table->boolean('ST_subject_mapeh')->default(0); // Setting
            $table->boolean('ST_subject_jp')->default(0); // Setting

            $table->boolean('ST_subject_sf10_acads')->default(0); // Setting
            $table->boolean('ST_subject_sf10_grade')->default(0); // Setting
        });
    }
    public function down () : void { Schema::dropIfExists('users'); }
};