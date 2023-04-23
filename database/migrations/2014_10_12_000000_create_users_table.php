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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('image')->nullable();
            $table->string('job_title')->nullable();
            $table->date('birthday')->nullable();
            $table->string('password');
            $table->string('about')->nullable();
            $table->string('phone')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->rememberToken();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
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
