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
        User::findOrFail(2)->members()->sync(array(4,80,17,27,72));
        User::findOrFail(3)->members()->sync(array(123,77,76,111,63));
        User::findOrFail(4)->members()->sync(array(107,89,7,57,50));
        User::findOrFail(5)->members()->sync(array(119,84,36,126,48));
        User::findOrFail(6)->members()->sync(array(56,28,40,125,51));
        User::findOrFail(7)->members()->sync(array(5,122,3,86,103));
        User::findOrFail(8)->members()->sync(array(24,64,127,91,105));
        User::findOrFail(9)->members()->sync(array(11,128,79,66,104));
        User::findOrFail(10)->members()->sync(array(92,1,55,130,62));
        User::findOrFail(11)->members()->sync(array(100,22,94,117,74));
        User::findOrFail(12)->members()->sync(array(93,58,114,82,12));
        User::findOrFail(13)->members()->sync(array(116,97,49,42,45));
        User::findOrFail(14)->members()->sync(array(59,2,81,75,140));
        User::findOrFail(15)->members()->sync(array(60,87,15,30,101));
        User::findOrFail(16)->members()->sync(array(47,113,137,29,109));
        User::findOrFail(17)->members()->sync(array(10,98,132,53,46));
        User::findOrFail(18)->members()->sync(array(43,124,118,106,6));
        User::findOrFail(19)->members()->sync(array(23,8,13,68,90));
        User::findOrFail(20)->members()->sync(array(110,131,65,71,14));
        User::findOrFail(21)->members()->sync(array(136,120,83,38,25));
        User::findOrFail(22)->members()->sync(array(115,20,96,95,34));
        User::findOrFail(23)->members()->sync(array(121,108,129,73,112));
        User::findOrFail(24)->members()->sync(array(67,99,133,61,16));
        User::findOrFail(25)->members()->sync(array(19,26,54,52,44));
        User::findOrFail(26)->members()->sync(array(102,37,88,69,70));
        User::findOrFail(27)->members()->sync(array(32,134,85,138,31));
        User::findOrFail(28)->members()->sync(array(21,39,135,9,139));
        User::findOrFail(29)->members()->sync(array(33,18,35,78,41));
    }
}
