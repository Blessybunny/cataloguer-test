<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyInteger('db_role_id');
            $table->tinyInteger('db_grade_id')->nullable();
            $table->tinyInteger('db_section_id')->nullable();

            $table->string('email', 50)->unique();
            $table->string('password');

            $table->string('name_last', 50);
            $table->string('name_first', 50);
        });
    }
    public function down () : void { Schema::dropIfExists('users'); }
};
