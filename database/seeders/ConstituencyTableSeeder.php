<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Constituency;

class ConstituencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cons = [
            
  [
    'name' => 'Manjeshwaram',
    'ID' => 1
  ],
  [
    'name' => 'Kasaragod',
    'ID' => 2
  ],
  [
    'name' => 'Udma',
    'ID' => 3
  ],
  [
    'name' => 'Kanhangad',
    'ID' => 4
  ],
  [
    'name' => 'Thrikaripur',
    'ID' => 5
  ],
  [
    'name' => 'Payyanur',
    'ID' => 6
  ],
  [
    'name' => 'Kalliasseri',
    'ID' => 7
  ],
  [
    'name' => 'Taliparamba',
    'ID' => 8
  ],
  [
    'name' => 'Irikkur',
    'ID' => 9
  ],
  [
    'name' => 'Azhikode',
    'ID' => 10
  ],
  [
    'name' => 'Kannur',
    'ID' => 11
  ],
  [
    'name' => 'Dharmadam',
    'ID' => 12
  ],
  [
    'name' => 'Thalassery',
    'ID' => 13
  ],
  [
    'name' => 'Kuthuparamba',
    'ID' => 14
  ],
  [
    'name' => 'Mattanur',
    'ID' => 15
  ],
  [
    'name' => 'Peravoor',
    'ID' => 16
  ],
  [
    'name' => 'Mananthavady',
    'ID' => 17
  ],
  [
    'name' => 'Sulthanbathery',
    'ID' => 18
  ],
  [
    'name' => 'Kalpetta',
    'ID' => 19
  ],
  [
    'name' => 'Vatakara',
    'ID' => 20
  ],
  [
    'name' => 'Kuttiady',
    'ID' => 21
  ],
  [
    'name' => 'Nadapuram',
    'ID' => 22
  ],
  [
    'name' => 'Koyilandy',
    'ID' => 23
  ],
  [
    'name' => 'Perambra',
    'ID' => 24
  ],
  [
    'name' => 'Balussery',
    'ID' => 25
  ],
  [
    'name' => 'Elathur',
    'ID' => 26
  ],
  [
    'name' => 'Kozhikode North',
    'ID' => 27
  ],
  [
    'name' => 'Kozhikode South',
    'ID' => 28
  ],
  [
    'name' => 'Beypore',
    'ID' => 29
  ],
  [
    'name' => 'Kunnamangalam',
    'ID' => 30
  ],
  [
    'name' => 'Koduvally',
    'ID' => 31
  ],
  [
    'name' => 'Thiruvambady',
    'ID' => 32
  ],
  [
    'name' => 'Kondotty',
    'ID' => 33
  ],
  [
    'name' => 'Ernad',
    'ID' => 34
  ],
  [
    'name' => 'Nilambur',
    'ID' => 35
  ],
  [
    'name' => 'Wandoor',
    'ID' => 36
  ],
  [
    'name' => 'Manjeri',
    'ID' => 37
  ],
  [
    'name' => 'Perinthalmanna',
    'ID' => 38
  ],
  [
    'name' => 'Mankada',
    'ID' => 39
  ],
  [
    'name' => 'Malappuram',
    'ID' => 40
  ],
  [
    'name' => 'Vengara',
    'ID' => 41
  ],
  [
    'name' => 'Vallikkunnu',
    'ID' => 42
  ],
  [
    'name' => 'Tirurangadi',
    'ID' => 43
  ],
  [
    'name' => 'Tanur',
    'ID' => 44
  ],
  [
    'name' => 'Tirur',
    'ID' => 45
  ],
  [
    'name' => 'Kottakkal',
    'ID' => 46
  ],
  [
    'name' => 'Thavanur',
    'ID' => 47
  ],
  [
    'name' => 'Ponnani',
    'ID' => 48
  ],
  [
    'name' => 'Thrithala',
    'ID' => 49
  ],
  [
    'name' => 'Pattambi',
    'ID' => 50
  ],
  [
    'name' => 'Shornur',
    'ID' => 51
  ],
  [
    'name' => 'Ottappalam',
    'ID' => 52
  ],
  [
    'name' => 'Kongad',
    'ID' => 53
  ],
  [
    'name' => 'Mannarkkad',
    'ID' => 54
  ],
  [
    'name' => 'Malampuzha',
    'ID' => 55
  ],
  [
    'name' => 'Palakkad',
    'ID' => 56
  ],
  [
    'name' => 'Tarur',
    'ID' => 57
  ],
  [
    'name' => 'Chittur',
    'ID' => 58
  ],
  [
    'name' => 'Nenmara',
    'ID' => 59
  ],
  [
    'name' => 'Alathur',
    'ID' => 60
  ],
  [
    'name' => 'Chelakkara',
    'ID' => 61
  ],
  [
    'name' => 'Kunnamkulam',
    'ID' => 62
  ],
  [
    'name' => 'Guruvayoor',
    'ID' => 63
  ],
  [
    'name' => 'Manalur',
    'ID' => 64
  ],
  [
    'name' => 'Wadakkanchery',
    'ID' => 65
  ],
  [
    'name' => 'Ollur',
    'ID' => 66
  ],
  [
    'name' => 'Thrissur',
    'ID' => 67
  ],
  [
    'name' => 'Nattika',
    'ID' => 68
  ],
  [
    'name' => 'Kaipamangalam',
    'ID' => 69
  ],
  [
    'name' => 'Irinjalakuda',
    'ID' => 70
  ],
  [
    'name' => 'Puthukkad',
    'ID' => 71
  ],
  [
    'name' => 'Chalakudy',
    'ID' => 72
  ],
  [
    'name' => 'Kodungallur',
    'ID' => 73
  ],
  [
    'name' => 'Perumbavoor',
    'ID' => 74
  ],
  [
    'name' => 'Angamaly',
    'ID' => 75
  ],
  [
    'name' => 'Aluva',
    'ID' => 76
  ],
  [
    'name' => 'Kalamassery',
    'ID' => 77
  ],
  [
    'name' => 'Paravur',
    'ID' => 78
  ],
  [
    'name' => 'Vypeen',
    'ID' => 79
  ],
  [
    'name' => 'Kochi',
    'ID' => 80
  ],
  [
    'name' => 'Thrippunithura',
    'ID' => 81
  ],
  [
    'name' => 'Ernakulam',
    'ID' => 82
  ],
  [
    'name' => 'Thrikkakara',
    'ID' => 83
  ],
  [
    'name' => 'Kunnathunad',
    'ID' => 84
  ],
  [
    'name' => 'Piravom',
    'ID' => 85
  ],
  [
    'name' => 'Muvattupuzha',
    'ID' => 86
  ],
  [
    'name' => 'Kothamangalam',
    'ID' => 87
  ],
  [
    'name' => 'Devikulam',
    'ID' => 88
  ],
  [
    'name' => 'Udumbanchola',
    'ID' => 89
  ],
  [
    'name' => 'Thodupuzha',
    'ID' => 90
  ],
  [
    'name' => 'Idukki',
    'ID' => 91
  ],
  [
    'name' => 'Peerumade',
    'ID' => 92
  ],
  [
    'name' => 'Pala',
    'ID' => 93
  ],
  [
    'name' => 'Kaduthuruthy',
    'ID' => 94
  ],
  [
    'name' => 'Vaikom',
    'ID' => 95
  ],
  [
    'name' => 'Ettumanoor',
    'ID' => 96
  ],
  [
    'name' => 'Kottayam',
    'ID' => 97
  ],
  [
    'name' => 'Puthuppally',
    'ID' => 98
  ],
  [
    'name' => 'Changanassery',
    'ID' => 99
  ],
  [
    'name' => 'Kanjirappally',
    'ID' => 100
  ],
  [
    'name' => 'Poonjar',
    'ID' => 101
  ],
  [
    'name' => 'Aroor',
    'ID' => 102
  ],
  [
    'name' => 'Cherthala',
    'ID' => 103
  ],
  [
    'name' => 'Alappuzha',
    'ID' => 104
  ],
  [
    'name' => 'Ambalappuzha',
    'ID' => 105
  ],
  [
    'name' => 'Kuttanad',
    'ID' => 106
  ],
  [
    'name' => 'Haripad',
    'ID' => 107
  ],
  [
    'name' => 'Kayamkulam',
    'ID' => 108
  ],
  [
    'name' => 'Mavelikkara',
    'ID' => 109
  ],
  [
    'name' => 'Chengannur',
    'ID' => 110
  ],
  [
    'name' => 'Thiruvalla',
    'ID' => 111
  ],
  [
    'name' => 'Ranni',
    'ID' => 112
  ],
  [
    'name' => 'Aranmula',
    'ID' => 113
  ],
  [
    'name' => 'Konni',
    'ID' => 114
  ],
  [
    'name' => 'Adoor',
    'ID' => 115
  ],
  [
    'name' => 'Karunagapally',
    'ID' => 116
  ],
  [
    'name' => 'Chavara',
    'ID' => 117
  ],
  [
    'name' => 'Kunnathur',
    'ID' => 118
  ],
  [
    'name' => 'Kottarakkara',
    'ID' => 119
  ],
  [
    'name' => 'Pathanapuram',
    'ID' => 120
  ],
  [
    'name' => 'Punalur',
    'ID' => 121
  ],
  [
    'name' => 'Chadayamangalam',
    'ID' => 122
  ],
  [
    'name' => 'Kundara',
    'ID' => 123
  ],
  [
    'name' => 'Kollam',
    'ID' => 124
  ],
  [
    'name' => 'Eravipuram',
    'ID' => 125
  ],
  [
    'name' => 'Chathannoor',
    'ID' => 126
  ],
  [
    'name' => 'Varkala',
    'ID' => 127
  ],
  [
    'name' => 'Attingal',
    'ID' => 128
  ],
  [
    'name' => 'Chirayinkeezhu',
    'ID' => 129
  ],
  [
    'name' => 'Nedumangad',
    'ID' => 130
  ],
  [
    'name' => 'Vamanapuram',
    'ID' => 131
  ],
  [
    'name' => 'Kazhakkoottam',
    'ID' => 132
  ],
  [
    'name' => 'Vattiyoorkavu',
    'ID' => 133
  ],
  [
    'name' => 'Thiruvananthapuram',
    'ID' => 134
  ],
  [
    'name' => 'Nemom',
    'ID' => 135
  ],
  [
    'name' => 'Aruvikkara',
    'ID' => 136
  ],
  [
    'name' => 'Parassala',
    'ID' => 137
  ],
  [
    'name' => 'Kattakkada',
    'ID' => 138
  ],
  [
    'name' => 'Kovalam',
    'ID' => 139
  ],
  [
    'name' => 'Neyyattinkara',
    'ID' => 140
  ]
        ];

        Constituency::insert($cons);
    }
}
