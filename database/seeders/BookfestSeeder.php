<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookFest;

class BookfestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookfests = [
            [
                'id'    => 1,
                'title' => '2023',
                'from' => '2023-01-09',
                'to' => '2023-01-15',
                'status' => 'active',
            ],
          
        ];

        BookFest::insert($bookfests);



    }
}
