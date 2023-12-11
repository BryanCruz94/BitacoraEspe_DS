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
            $table->string('datedeparture_time');
            $table->string('entry_time');
            $table->string('destination');
            $table->string('departure_km');
            $table->string('entry_km');
            $table->string('mission');
            $table->string('observation');
            $table->int('GuardsOut_id');
            $table->int('GuardsIn_id');
            $table->int('Vehicle_id');
            $table->int('Driver_id');
            $table->foreign('GuardsOut_id')->references('id')->on('guards');
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
