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
        Schema::create('_vehicle_logs', function (Blueprint $table) {
            $table->id();
            $table->string('departure_time');
            $table->string('destination');
            $table->string('entry_time');
            $table->string('departure_km');
            $table->string('entry_km');
            $table->string('mission');
            $table->string('observation');
            $table->foreignId('GuardsOut_id');
            $table->foreignId('GuardsIn_id');
            $table->foreignId('Vehicle_id');
            $table->foreignId('Driver_id');
            $table->foreign('GuardsOut_id')->references('id')->on('users');
            $table->foreign('GuardsIn_id')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_vehicle_logs');
    }
};
