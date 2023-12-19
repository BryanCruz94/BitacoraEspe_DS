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
        Schema::create('vehicle_logs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('departure_time');
            $table->string('destination');
            $table->dateTime('entry_time')->nullable();
            $table->string('departure_km');
            $table->string('entry_km')->nullable();
            $table->string('mission');
            $table->string('observation')->nullable();
            $table->foreignId('GuardsOut_id');
            $table->foreignId('GuardsIn_id')->nullable();
            $table->foreignId('Vehicle_id');
            $table->foreignId('Driver_id');
            $table->foreign('GuardsOut_id')->references('id')->on('users');
            $table->foreign('GuardsIn_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_logs');
    }
};
