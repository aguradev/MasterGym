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
        Schema::create('central_users', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("credential_id")->unique()->references("id")->on("central_credentials");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("profile_url")->default("profile.png");
            $table->string("bio");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('central_users');
    }
};
