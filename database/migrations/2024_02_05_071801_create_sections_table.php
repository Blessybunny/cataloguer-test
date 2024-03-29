<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->tinyInteger('DB_GRADE_id'); // Reference a grade
            $table->integer('DB_USER_id')->nullable()->unique(); // Reference a user (adviser)

            $table->string('section', 50)->nullable();
        });
    }
    public function down () : void { Schema::dropIfExists('sections'); }
};
