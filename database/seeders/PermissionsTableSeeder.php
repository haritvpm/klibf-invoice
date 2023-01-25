<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'member_create',
            ],
            [
                'id'    => 18,
                'title' => 'member_edit',
            ],
            [
                'id'    => 19,
                'title' => 'member_show',
            ],
            [
                'id'    => 20,
                'title' => 'member_delete',
            ],
            [
                'id'    => 21,
                'title' => 'member_access',
            ],
            [
                'id'    => 22,
                'title' => 'publisher_create',
            ],
            [
                'id'    => 23,
                'title' => 'publisher_edit',
            ],
            [
                'id'    => 24,
                'title' => 'publisher_show',
            ],
            [
                'id'    => 25,
                'title' => 'publisher_delete',
            ],
            [
                'id'    => 26,
                'title' => 'publisher_access',
            ],
            [
                'id'    => 27,
                'title' => 'invoice_list_create',
            ],
            [
                'id'    => 28,
                'title' => 'invoice_list_edit',
            ],
            [
                'id'    => 29,
                'title' => 'invoice_list_show',
            ],
            [
                'id'    => 30,
                'title' => 'invoice_list_delete',
            ],
            [
                'id'    => 31,
                'title' => 'invoice_list_access',
            ],
            [
                'id'    => 32,
                'title' => 'invoice_item_create',
            ],
            [
                'id'    => 33,
                'title' => 'invoice_item_edit',
            ],
            [
                'id'    => 34,
                'title' => 'invoice_item_show',
            ],
            [
                'id'    => 35,
                'title' => 'invoice_item_delete',
            ],
            [
                'id'    => 36,
                'title' => 'invoice_item_access',
            ],
            [
                'id'    => 37,
                'title' => 'book_fest_create',
            ],
            [
                'id'    => 38,
                'title' => 'book_fest_edit',
            ],
            [
                'id'    => 39,
                'title' => 'book_fest_show',
            ],
            [
                'id'    => 40,
                'title' => 'book_fest_access',
            ],
            [
                'id'    => 41,
                'title' => 'financial_year_create',
            ],
            [
                'id'    => 42,
                'title' => 'financial_year_edit',
            ],
            [
                'id'    => 43,
                'title' => 'financial_year_show',
            ],
            [
                'id'    => 44,
                'title' => 'financial_year_delete',
            ],
            [
                'id'    => 45,
                'title' => 'financial_year_access',
            ],
            [
                'id'    => 46,
                'title' => 'sanctioned_amount_create',
            ],
            [
                'id'    => 47,
                'title' => 'sanctioned_amount_edit',
            ],
            [
                'id'    => 48,
                'title' => 'sanctioned_amount_show',
            ],
            [
                'id'    => 49,
                'title' => 'sanctioned_amount_delete',
            ],
            [
                'id'    => 50,
                'title' => 'sanctioned_amount_access',
            ],
            [
                'id'    => 51,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
