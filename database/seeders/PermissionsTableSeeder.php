<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'title' => 'constituency_create',
            ],
            [
                'id'    => 18,
                'title' => 'constituency_edit',
            ],
            [
                'id'    => 19,
                'title' => 'constituency_show',
            ],
            [
                'id'    => 20,
                'title' => 'constituency_delete',
            ],
            [
                'id'    => 21,
                'title' => 'constituency_access',
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
                'title' => 'book_fest_create',
            ],
            [
                'id'    => 28,
                'title' => 'book_fest_edit',
            ],
            [
                'id'    => 29,
                'title' => 'book_fest_show',
            ],
            [
                'id'    => 30,
                'title' => 'book_fest_access',
            ],
            [
                'id'    => 31,
                'title' => 'mla_create',
            ],
            [
                'id'    => 32,
                'title' => 'mla_edit',
            ],
            [
                'id'    => 33,
                'title' => 'mla_show',
            ],
            [
                'id'    => 34,
                'title' => 'mla_delete',
            ],
            [
                'id'    => 35,
                'title' => 'mla_access',
            ],
            [
                'id'    => 36,
                'title' => 'member_fund_create',
            ],
            [
                'id'    => 37,
                'title' => 'member_fund_edit',
            ],
            [
                'id'    => 38,
                'title' => 'member_fund_show',
            ],
            [
                'id'    => 39,
                'title' => 'member_fund_delete',
            ],
            [
                'id'    => 40,
                'title' => 'member_fund_access',
            ],
            [
                'id'    => 41,
                'title' => 'invoice_list_create',
            ],
            [
                'id'    => 42,
                'title' => 'invoice_list_edit',
            ],
            [
                'id'    => 43,
                'title' => 'invoice_list_show',
            ],
            [
                'id'    => 44,
                'title' => 'invoice_list_delete',
            ],
            [
                'id'    => 45,
                'title' => 'invoice_list_access',
            ],
            [
                'id'    => 46,
                'title' => 'invoice_item_create',
            ],
            [
                'id'    => 47,
                'title' => 'invoice_item_edit',
            ],
            [
                'id'    => 48,
                'title' => 'invoice_item_show',
            ],
            [
                'id'    => 49,
                'title' => 'invoice_item_delete',
            ],
            [
                'id'    => 50,
                'title' => 'invoice_item_access',
            ],
            [
                'id'    => 51,
                'title' => 'account_access',
            ],
            [
                'id'    => 52,
                'title' => 'product_create',
            ],
            [
                'id'    => 53,
                'title' => 'product_edit',
            ],
            [
                'id'    => 54,
                'title' => 'product_show',
            ],
            [
                'id'    => 55,
                'title' => 'product_delete',
            ],
            [
                'id'    => 56,
                'title' => 'product_access',
            ],
            [
                'id'    => 57,
                'title' => 'sale_create',
            ],
            [
                'id'    => 58,
                'title' => 'sale_edit',
            ],
            [
                'id'    => 59,
                'title' => 'sale_show',
            ],
            [
                'id'    => 60,
                'title' => 'sale_delete',
            ],
            [
                'id'    => 61,
                'title' => 'sale_access',
            ],
            [
                'id'    => 62,
                'title' => 'sale_item_create',
            ],
            [
                'id'    => 63,
                'title' => 'sale_item_edit',
            ],
            [
                'id'    => 64,
                'title' => 'sale_item_show',
            ],
            [
                'id'    => 65,
                'title' => 'sale_item_delete',
            ],
            [
                'id'    => 66,
                'title' => 'sale_item_access',
            ],
            [
                'id'    => 67,
                'title' => 'profile_password_edit',
            ],
        ];
        
        DB::table('permissions')->delete();
        
        Permission::insert($permissions);
    }
}
