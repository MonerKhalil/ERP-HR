<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'country_id' =>  Country::inRandomOrder()->first()->id,
            'city' => 'homos',
            'is_active' => "1",

        ]);
    }
}
