<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i<=20;$i++){
            Position::create([
                "name" => "Position_".$i,
                "rate_salary" => $i,
                "rate_stimulus" => $i,
                "created_at" => now(),
            ]);
        }
    }
}
