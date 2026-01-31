<?php

namespace Database\Seeders;

use App\Models\Cupon;
use App\Traits\LoadsMockData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuponSeeder extends Seeder
{
    use LoadsMockData;
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cupons = $this->getCupons();
        
        foreach ($cupons as $cupon) {
            Cupon::create($cupon);
        }
    }
}
