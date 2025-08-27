<?php

namespace Database\Seeders;

use App\Models\Vehicle;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        Vehicle::create(['brand' => 'Audi', 'model' => 'A4', 'plate' => 'ΙΚΧ-1234', 'year' => 2015]);
        Vehicle::create(['brand' => 'BMW', 'model' => '320d', 'plate' => 'ΙΝΧ-5678', 'year' => 2018]);
    }
}
