<?php

namespace Database\Seeders;

use App\Models\Education_data;
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

        for ($i = 1 ; $i<=10;$i++){
            Education_data::create([
                "employee_id" => $i,
                "id_ed_lev" => $i,
                "college_name" => "sakm".$i,
                "amount_impact_salary" => $i,
                "created_at" => now(),
                "grant_date" => now(),
            ]);
        }
    }
}
