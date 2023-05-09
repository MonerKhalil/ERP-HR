<?php

namespace Database\Seeders;

use App\Models\Education_level;
use App\Models\Language_skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(EducationLevelSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(membershipTypesSeeder::class);
    }
}
