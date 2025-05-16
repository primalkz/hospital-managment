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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile', 12)->nullable();
            $table->date('dob')->nullable(); 
            $table->string('password');
            $table->enum('type', ['admin','doctor','patient'])->default('patient');
            $table->integer('status')->default(1);
            
            // Doctor specific fields
            $table->string('specialty')->nullable();
            $table->integer('experience_years')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('bio')->nullable();
            $table->string('profile_image')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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