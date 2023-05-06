<?php

namespace Database\Seeders;

use App\Models\Education_level;
use App\Models\Sections;
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
//        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(EducationLevelSeeder::class);
        $this->call(SectionsSeeder::class);
    }
}
