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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('identification_card');
            $table->string('names');
            $table->string('last_names');
            $table->string('phone');
            $table->string('blood_type');
            $table->int('rank_id');
            $table->string('license_number');
            $table->string('img_url');
            $table->foreign('rank_id')->references('id')->on('ranks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
