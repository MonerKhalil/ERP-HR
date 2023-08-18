<?php

namespace Database\Seeders;

use App\Models\WorkSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class WorkSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkSetting::create([
            "name" => "general",
            "count_days_work_in_weeks" => 5,
            "count_hours_work_in_days" => 8,
            "days_leaves_in_weeks" => 'Sunday,Monday,Tuesday,Wednesday,Thursday',
            "work_hours_from" => Carbon::create(0,0,0,9)->format("G:i:s"),
            "work_hours_to" => Carbon::create(0,0,0,17)->format("G:i:s"),
            "late_enter_allowance_per_minute" => 2 ,
            "early_out_allowance_per_minute" => 2 ,
            "salary_default" => 1000,
            "rate_deduction_from_salary" => 2,
            "type_discount_minuteOrHour" => "hour",
        ]);
    }
}
