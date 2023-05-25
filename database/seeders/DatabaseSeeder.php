<?php

namespace Database\Seeders;

use App\Models\Education_level;
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
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(SectionsSeeder::class);
        $this->call(TypeDecisionSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(EducationLevelSeeder::class);
        $this->call(SessionDecisionSeeder::class);
        $this->call(DecisionSeeder::class);
        $this->call(ConferenceSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(membershipTypesSeeder::class);
        $this->call(DataEndServiceSeeder::class);
    }
}
