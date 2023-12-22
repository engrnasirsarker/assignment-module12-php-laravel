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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->date('trip_date');
            // $table->unsignedBigInteger('departure_location_id');
            // $table->unsignedBigInteger('arrival_location_id');

             // Foreign key references
             $table->unsignedBigInteger('departure_location_id');
             $table->foreign('departure_location_id')->references('id')->on('locations');
             
             $table->unsignedBigInteger('arrival_location_id');
             $table->foreign('arrival_location_id')->references('id')->on('locations');
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
