<?php

namespace Database\Seeders;

use App\Models\WorkSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
            "days_leaves_in_weeks" => 2,
            "work_hours_from" => Carbon::create(0,0,0,9)->format("G:i:s"),
            "work_hours_to" => Carbon::create(0,0,0,17)->format("G:i:s"),
        ]);
    }
}
