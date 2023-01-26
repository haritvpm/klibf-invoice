<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MemberFund;

class MemberFundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [
 
          0 => [
            'mla_id' => '1',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '42',
          ],
          1 => [
            'mla_id' => '2',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '62',
          ],
          2 => [
            'mla_id' => '3',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '28',
          ],
          3 => [
            'mla_id' => '4',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '1',
          ],
          4 => [
            'mla_id' => '5',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '26',
          ],
          5 => [
            'mla_id' => '6',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '85',
          ],
          6 => [
            'mla_id' => '7',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '13',
          ],
          7 => [
            'mla_id' => '8',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '87',
          ],
          8 => [
            'mla_id' => '9',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '134',
          ],
          9 => [
            'mla_id' => '10',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '76',
          ],
          10 => [
            'mla_id' => '11',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '36',
          ],
          11 => [
            'mla_id' => '12',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '55',
          ],
          12 => [
            'mla_id' => '13',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '88',
          ],
          13 => [
            'mla_id' => '14',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '95',
          ],
          14 => [
            'mla_id' => '15',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '68',
          ],
          15 => [
            'mla_id' => '16',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '115',
          ],
          16 => [
            'mla_id' => '17',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '3',
          ],
          17 => [
            'mla_id' => '18',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '137',
          ],
          18 => [
            'mla_id' => '19',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '116',
          ],
          19 => [
            'mla_id' => '20',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '102',
          ],
          20 => [
            'mla_id' => '21',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '131',
          ],
          21 => [
            'mla_id' => '22',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '47',
          ],
          22 => [
            'mla_id' => '23',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '86',
          ],
          23 => [
            'mla_id' => '24',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '31',
          ],
          24 => [
            'mla_id' => '25',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '100',
          ],
          25 => [
            'mla_id' => '26',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '117',
          ],
          26 => [
            'mla_id' => '27',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '4',
          ],
          27 => [
            'mla_id' => '28',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '22',
          ],
          28 => [
            'mla_id' => '29',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '74',
          ],
          29 => [
            'mla_id' => '30',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '69',
          ],
          30 => [
            'mla_id' => '31',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '130',
          ],
          31 => [
            'mla_id' => '32',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '126',
          ],
          32 => [
            'mla_id' => '33',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '136',
          ],
          33 => [
            'mla_id' => '34',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '105',
          ],
          34 => [
            'mla_id' => '35',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '138',
          ],
          35 => [
            'mla_id' => '36',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '18',
          ],
          36 => [
            'mla_id' => '37',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '122',
          ],
          37 => [
            'mla_id' => '38',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '99',
          ],
          38 => [
            'mla_id' => '39',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '132',
          ],
          39 => [
            'mla_id' => '40',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '23',
          ],
          40 => [
            'mla_id' => '41',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '140',
          ],
          41 => [
            'mla_id' => '42',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '59',
          ],
          42 => [
            'mla_id' => '43',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '81',
          ],
          43 => [
            'mla_id' => '44',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '120',
          ],
          44 => [
            'mla_id' => '45',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '60',
          ],
          45 => [
            'mla_id' => '46',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '80',
          ],
          46 => [
            'mla_id' => '47',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '71',
          ],
          47 => [
            'mla_id' => '48',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '20',
          ],
          48 => [
            'mla_id' => '49',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '58',
          ],
          49 => [
            'mla_id' => '50',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '15',
          ],
          50 => [
            'mla_id' => '51',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '25',
          ],
          51 => [
            'mla_id' => '52',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '119',
          ],
          52 => [
            'mla_id' => '53',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '79',
          ],
          53 => [
            'mla_id' => '54',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '118',
          ],
          54 => [
            'mla_id' => '55',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '43',
          ],
          55 => [
            'mla_id' => '56',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '21',
          ],
          56 => [
            'mla_id' => '57',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '14',
          ],
          57 => [
            'mla_id' => '58',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '52',
          ],
          58 => [
            'mla_id' => '59',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '61',
          ],
          59 => [
            'mla_id' => '60',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '66',
          ],
          60 => [
            'mla_id' => '61',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '114',
          ],
          61 => [
            'mla_id' => '62',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '45',
          ],
          62 => [
            'mla_id' => '63',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '10',
          ],
          63 => [
            'mla_id' => '64',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '32',
          ],
          64 => [
            'mla_id' => '65',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '93',
          ],
          65 => [
            'mla_id' => '66',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '39',
          ],
          66 => [
            'mla_id' => '67',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '111',
          ],
          67 => [
            'mla_id' => '68',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '89',
          ],
          68 => [
            'mla_id' => '69',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '124',
          ],
          69 => [
            'mla_id' => '70',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '125',
          ],
          70 => [
            'mla_id' => '71',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '94',
          ],
          71 => [
            'mla_id' => '72',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '5',
          ],
          72 => [
            'mla_id' => '73',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '109',
          ],
          73 => [
            'mla_id' => '74',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '50',
          ],
          74 => [
            'mla_id' => '75',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '64',
          ],
          75 => [
            'mla_id' => '76',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '8',
          ],
          76 => [
            'mla_id' => '77',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '7',
          ],
          77 => [
            'mla_id' => '78',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '139',
          ],
          78 => [
            'mla_id' => '79',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '38',
          ],
          79 => [
            'mla_id' => '80',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '2',
          ],
          80 => [
            'mla_id' => '81',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '63',
          ],
          81 => [
            'mla_id' => '82',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '54',
          ],
          82 => [
            'mla_id' => '83',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '98',
          ],
          83 => [
            'mla_id' => '84',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '17',
          ],
          84 => [
            'mla_id' => '85',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '128',
          ],
          85 => [
            'mla_id' => '86',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '29',
          ],
          86 => [
            'mla_id' => '87',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '67',
          ],
          87 => [
            'mla_id' => '88',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '123',
          ],
          88 => [
            'mla_id' => '89',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '12',
          ],
          89 => [
            'mla_id' => '90',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '90',
          ],
          90 => [
            'mla_id' => '91',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '34',
          ],
          91 => [
            'mla_id' => '92',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '41',
          ],
          92 => [
            'mla_id' => '93',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '51',
          ],
          93 => [
            'mla_id' => '94',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '48',
          ],
          94 => [
            'mla_id' => '95',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '104',
          ],
          95 => [
            'mla_id' => '96',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '103',
          ],
          96 => [
            'mla_id' => '97',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '57',
          ],
          97 => [
            'mla_id' => '98',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '77',
          ],
          98 => [
            'mla_id' => '99',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '112',
          ],
          99 => [
            'mla_id' => '100',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '46',
          ],
          100 => [
            'mla_id' => '101',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '70',
          ],
          101 => [
            'mla_id' => '102',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '121',
          ],
          102 => [
            'mla_id' => '103',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '30',
          ],
          103 => [
            'mla_id' => '104',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '40',
          ],
          104 => [
            'mla_id' => '105',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '35',
          ],
          105 => [
            'mla_id' => '106',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '84',
          ],
          106 => [
            'mla_id' => '107',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '11',
          ],
          107 => [
            'mla_id' => '108',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '107',
          ],
          108 => [
            'mla_id' => '109',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '75',
          ],
          109 => [
            'mla_id' => '110',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '91',
          ],
          110 => [
            'mla_id' => '111',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '9',
          ],
          111 => [
            'mla_id' => '112',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '110',
          ],
          112 => [
            'mla_id' => '113',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '72',
          ],
          113 => [
            'mla_id' => '114',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '53',
          ],
          114 => [
            'mla_id' => '115',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '101',
          ],
          115 => [
            'mla_id' => '116',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '56',
          ],
          116 => [
            'mla_id' => '117',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '49',
          ],
          117 => [
            'mla_id' => '118',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '83',
          ],
          118 => [
            'mla_id' => '119',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '16',
          ],
          119 => [
            'mla_id' => '120',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '97',
          ],
          120 => [
            'mla_id' => '121',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '106',
          ],
          121 => [
            'mla_id' => '122',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '27',
          ],
          122 => [
            'mla_id' => '123',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '6',
          ],
          123 => [
            'mla_id' => '124',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '82',
          ],
          124 => [
            'mla_id' => '125',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '24',
          ],
          125 => [
            'mla_id' => '126',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '19',
          ],
          126 => [
            'mla_id' => '127',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '33',
          ],
          127 => [
            'mla_id' => '128',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '37',
          ],
          128 => [
            'mla_id' => '129',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '108',
          ],
          129 => [
            'mla_id' => '130',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '44',
          ],
          130 => [
            'mla_id' => '131',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '92',
          ],
          131 => [
            'mla_id' => '132',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '78',
          ],
          132 => [
            'mla_id' => '133',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '113',
          ],
          133 => [
            'mla_id' => '134',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '127',
          ],
          134 => [
            'mla_id' => '135',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '133',
          ],
          135 => [
            'mla_id' => '136',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '96',
          ],
          136 => [
            'mla_id' => '137',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '73',
          ],
          137 => [
            'mla_id' => '138',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '129',
          ],
          138 => [
            'mla_id' => '139',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '135',
          ],
          139 => [
            'mla_id' => '140',
            'bookfest_id' => '1',
            'as_amount' => '0',
            'CONSTITUENCY_ID' => '65',
          ],

        ];

        MemberFund::insert($members);
    }
}
