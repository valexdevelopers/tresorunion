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
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->date('dob');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('country');
            $table->string('state');
            $table->string('address');
            $table->bigInteger('accountnumber');
            $table->integer('pin');
            $table->string('password');
            $table->string('status');
            $table->string('passport')->nullable();
            $table->string('question');
            $table->string('answer');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
