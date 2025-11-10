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
          $table->id(); // id
            $table->string('name'); // name
            $table->string('mobile')->unique(); // mobile
            $table->string('email')->unique(); // email
            $table->string('address')->nullable(); // address
            $table->string('address2')->nullable(); // address2
            $table->string('city')->nullable(); // city
            $table->string('state')->nullable(); // state
            $table->string('pincode', 10)->nullable(); // pincode
            $table->timestamp('email_verified_at')->nullable(); // email_verified_at
            $table->string('password'); // password
            $table->rememberToken(); // remember_token
            $table->timestamps(); // created_at, updated_at
            $table->string('otp')->nullable(); // otp
            $table->timestamp('otp_expires_at')->nullable(); // otp_expires_at
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
