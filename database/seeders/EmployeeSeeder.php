<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ;$i<=20 ; $i++){
            Employee::create([
                "user_id" => $i,
                "section_id" => 1,
                "nationality" => $i,
                "first_name" => $i."kmdakmds",
                "last_name" => $i."kmdakmds",
                "father_name" => $i."kmdakmds",
                "mother_name" => $i."kmdakmds",
                "NP_registration" => $i,
                "birth_place" => $i,
                "job_site" => $i."kmdakmds",
                "current_job" => $i."kmdakmds",
                "number_national" => $i,
                "number_file" => $i,
                "number_insurance" => $i,
                "number_self" => $i,
                "number_child" => $i,
                "number_wives" => $i,
                "gender" => "male",
                "reason_exemption" => $i."kmdakmds",
                "military_service" => "performer",
                "family_status" => "married",
                "birth_date" => now(),
                "created_at" => now(),
            ]);
        }
    }
}
