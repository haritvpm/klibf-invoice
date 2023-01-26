<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BookfestSeeder::class,
            ConstituencyTableSeeder::class,
            MembersTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            ConstituencyUserSeeder::class,
            PublishersTableSeeder::class,

        ]);
    }
}
