<?php

namespace Database\Seeders;

use App\Models\Membership_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class membershipTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i<10;$i++){
            Membership_type::create([
                "name" => $i."test",
            ]);
        }
    }
}
