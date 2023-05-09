<?php

namespace Database\Seeders;

use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i<=10;$i++){
            Sections::create([
                "address_id" => $i,
                "name" => "section_".$i,
                "details" => "xxxxxxxxxxxxx".$i,
            ]);
        }
    }
}
