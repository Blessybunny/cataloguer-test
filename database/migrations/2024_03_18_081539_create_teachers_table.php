<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('DB_USER_id')->nullable(); // Reference a user (teacher)
            $table->integer('DB_SECTION_id')->nullable(); // Reference a section
        });
    }
    public function down () : void {
        Schema::dropIfExists('teachers');
    }
};