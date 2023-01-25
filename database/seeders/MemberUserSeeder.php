<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class MemberUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(2)->constituencies()->sync(array(1,2,3,4,5));
        User::findOrFail(3)->constituencies()->sync(array(6,7,8,9,10));
        User::findOrFail(4)->constituencies()->sync(array(11,12,13,14,15));
        User::findOrFail(5)->constituencies()->sync(array(16,17,18,19,20));
        User::findOrFail(6)->constituencies()->sync(array(21,22,23,24,25));
        User::findOrFail(7)->constituencies()->sync(array(26,27,28,29,30));
        User::findOrFail(8)->constituencies()->sync(array(31,32,33,34,35));
        User::findOrFail(9)->constituencies()->sync(array(36,37,38,39,40));
        User::findOrFail(10)->constituencies()->sync(array(41,42,43,44,45));
        User::findOrFail(11)->constituencies()->sync(array(46,47,48,49,50));
        User::findOrFail(12)->constituencies()->sync(array(51,52,53,54,55));
        User::findOrFail(13)->constituencies()->sync(array(56,57,58,59,60));
        User::findOrFail(14)->constituencies()->sync(array(61,62,63,64,65));
        User::findOrFail(15)->constituencies()->sync(array(66,67,68,69,70));
        User::findOrFail(16)->constituencies()->sync(array(71,72,73,74,75));
        User::findOrFail(17)->constituencies()->sync(array(76,77,78,79,80));
        User::findOrFail(18)->constituencies()->sync(array(81,82,83,84,85));
        User::findOrFail(19)->constituencies()->sync(array(86,87,88,89,90));
        User::findOrFail(20)->constituencies()->sync(array(91,92,93,94,95));
        User::findOrFail(21)->constituencies()->sync(array(96,97,98,99,100));
        User::findOrFail(22)->constituencies()->sync(array(101,102,103,104,105));
        User::findOrFail(23)->constituencies()->sync(array(106,107,108,109,110));
        User::findOrFail(24)->constituencies()->sync(array(111,112,113,114,115));
        User::findOrFail(25)->constituencies()->sync(array(116,117,118,119,120));
        User::findOrFail(26)->constituencies()->sync(array(121,122,123,124,125));
        User::findOrFail(27)->constituencies()->sync(array(126,127,128,129,130));
        User::findOrFail(28)->constituencies()->sync(array(131,132,133,134,135));
        User::findOrFail(29)->constituencies()->sync(array(136,137,138,139,140));
    }
}
