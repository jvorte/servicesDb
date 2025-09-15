<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_add_service_interval_to_vehicles_table.php
public function up(): void
{
    Schema::table('vehicles', function (Blueprint $table) {
        $table->integer('service_interval_km')->default(10000); // κάθε 10.000 km
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            //
        });
    }
};
