<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = require app_path("Roles_Permissions_Config/roles.php");
        foreach ($roles as $role => $permissions) {
            $role = Role::create(['name' => $role]);
            $permissions = Permission::query()->whereIn("name",$permissions)->pluck("id","id")->all();
            $role->syncPermissions($permissions);
            $user = User::create([
                "name" => $role->name,
                "email" => $role->name."@"."system.com",
                "password" => Hash::make("123123123"),
            ]);
            $user->assignRole([$role->id]);

        }
    }
}
