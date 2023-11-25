<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            // ALL -> Learner's information
            $table->id(); // warning: LRN is impossibly long for an integer
            $table->string('li_name_last', 100);
            $table->string('li_name_first', 100);
            $table->string('li_name_middle', 100);
            $table->string('li_sex', 100);
            $table->date('li_birthdate'); // format: yy-mm-dd
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('users');
    }
};
