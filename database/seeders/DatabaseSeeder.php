<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            //BookfestSeeder::class,
            //ConstituencyTableSeeder::class,
            //MLATableSeeder::class,
           // MemberFundTableSeeder::class,
            PermissionsTableSeeder::class,
           // RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
           // UsersTableSeeder::class,
           // RoleUserTableSeeder::class,
           // ConstituencyUserSeeder::class,
            //PublishersTableSeeder::class,

        ]);
    }
}
