<?php

namespace Database\Seeders;

use App\Models\Education_level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i<10;$i++){
            Education_level::create([
                "name" => $i."test",
                "created_at" => now(),
            ]);
        }
    }
}
