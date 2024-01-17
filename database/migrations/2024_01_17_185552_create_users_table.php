<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up () : void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('info_deped_id', 50)->unique();
            $table->text('info_password');
            $table->string('info_role', 50);
            $table->string('info_name_last', 50);
            $table->string('info_name_first', 50);
            $table->string('info_name_suffix', 50)->nullable();
            $table->string('info_name_middle', 50);
            $table->string('info_sex', 50);
            $table->date('info_birthdate');
        });
    }
    
    public function down () : void {
        Schema::dropIfExists('users');
    }
};
