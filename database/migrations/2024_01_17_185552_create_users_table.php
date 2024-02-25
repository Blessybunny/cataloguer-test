<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyInteger('DB_ROLE_id'); // Used to reference a role
            $table->tinyInteger('DB_GRADE_id')->nullable(); // Used to reference a grade
            $table->tinyInteger('DB_SECTION_id')->nullable(); // Used to reference a section

            $table->string('email', 50)->unique();
            $table->string('password');

            $table->string('name_last', 50);
            $table->string('name_first', 50);
        });
    }
    public function down () : void { Schema::dropIfExists('users'); }
};
