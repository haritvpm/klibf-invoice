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
          0 => [
            'name' => 'Manjeshwaram',
            'ID' => '1',
            'name_mal' => 'മഞ്ചേശ്വരം',
          ],
          1 => [
            'name' => 'Kasaragod',
            'ID' => '2',
            'name_mal' => 'കാസർഗോഡ്',
          ],
          2 => [
            'name' => 'Udma',
            'ID' => '3',
            'name_mal' => 'ഉദുമ',
          ],
          3 => [
            'name' => 'Kanhangad',
            'ID' => '4',
            'name_mal' => 'കാഞ്ഞങ്ങാട്',
          ],
          4 => [
            'name' => 'Thrikaripur',
            'ID' => '5',
            'name_mal' => 'തൃക്കരിപ്പൂർ',
          ],
          5 => [
            'name' => 'Payyanur',
            'ID' => '6',
            'name_mal' => 'പയ്യന്നൂർ',
          ],
          6 => [
            'name' => 'Kalliasseri',
            'ID' => '7',
            'name_mal' => 'കല്ല്യാശ്ശേരി',
          ],
          7 => [
            'name' => 'Taliparamba',
            'ID' => '8',
            'name_mal' => 'തളിപ്പറമ്പ്',
          ],
          8 => [
            'name' => 'Irikkur',
            'ID' => '9',
            'name_mal' => 'ഇരിക്കൂർ',
          ],
          9 => [
            'name' => 'Azhikode',
            'ID' => '10',
            'name_mal' => 'അഴീക്കോട്',
          ],
          10 => [
            'name' => 'Kannur',
            'ID' => '11',
            'name_mal' => 'കണ്ണൂർ',
          ],
          11 => [
            'name' => 'Dharmadam',
            'ID' => '12',
            'name_mal' => 'ധർമ്മടം',
          ],
          12 => [
            'name' => 'Thalassery',
            'ID' => '13',
            'name_mal' => 'തലശ്ശേരി',
          ],
          13 => [
            'name' => 'Kuthuparamba',
            'ID' => '14',
            'name_mal' => 'കൂത്തുപറമ്പ്',
          ],
          14 => [
            'name' => 'Mattanur',
            'ID' => '15',
            'name_mal' => 'മട്ടന്നൂർ',
          ],
          15 => [
            'name' => 'Peravoor',
            'ID' => '16',
            'name_mal' => 'പേരാവൂർ',
          ],
          16 => [
            'name' => 'Mananthavady',
            'ID' => '17',
            'name_mal' => 'മാനന്തവാടി',
          ],
          17 => [
            'name' => 'Sulthanbathery',
            'ID' => '18',
            'name_mal' => 'സുൽത്താൻബത്തേരി',
          ],
          18 => [
            'name' => 'Kalpetta',
            'ID' => '19',
            'name_mal' => 'കല്പറ്റ',
          ],
          19 => [
            'name' => 'Vatakara',
            'ID' => '20',
            'name_mal' => 'വടകര',
          ],
          20 => [
            'name' => 'Kuttiady',
            'ID' => '21',
            'name_mal' => 'കുറ്റ്യാടി',
          ],
          21 => [
            'name' => 'Nadapuram',
            'ID' => '22',
            'name_mal' => 'നാദാപുരം',
          ],
          22 => [
            'name' => 'Koyilandy',
            'ID' => '23',
            'name_mal' => 'കൊയിലാണ്ടി',
          ],
          23 => [
            'name' => 'Perambra',
            'ID' => '24',
            'name_mal' => 'പേരാമ്പ്ര',
          ],
          24 => [
            'name' => 'Balussery',
            'ID' => '25',
            'name_mal' => 'ബാലുശ്ശേരി',
          ],
          25 => [
            'name' => 'Elathur',
            'ID' => '26',
            'name_mal' => 'എലത്തൂർ',
          ],
          26 => [
            'name' => 'Kozhikode North',
            'ID' => '27',
            'name_mal' => 'കോഴിക്കോട് വടക്ക്',
          ],
          27 => [
            'name' => 'Kozhikode South',
            'ID' => '28',
            'name_mal' => 'കോഴിക്കോട് തെക്ക്',
          ],
          28 => [
            'name' => 'Beypore',
            'ID' => '29',
            'name_mal' => 'ബേപ്പൂർ',
          ],
          29 => [
            'name' => 'Kunnamangalam',
            'ID' => '30',
            'name_mal' => 'കുന്ദമംഗലം',
          ],
          30 => [
            'name' => 'Koduvally',
            'ID' => '31',
            'name_mal' => 'കൊടുവള്ളി',
          ],
          31 => [
            'name' => 'Thiruvambady',
            'ID' => '32',
            'name_mal' => 'തിരുവമ്പാടി',
          ],
          32 => [
            'name' => 'Kondotty',
            'ID' => '33',
            'name_mal' => 'കൊണ്ടോട്ടി',
          ],
          33 => [
            'name' => 'Ernad',
            'ID' => '34',
            'name_mal' => 'ഏറനാട്',
          ],
          34 => [
            'name' => 'Nilambur',
            'ID' => '35',
            'name_mal' => 'നിലമ്പൂർ',
          ],
          35 => [
            'name' => 'Wandoor',
            'ID' => '36',
            'name_mal' => 'വണ്ടൂർ',
          ],
          36 => [
            'name' => 'Manjeri',
            'ID' => '37',
            'name_mal' => 'മഞ്ചേരി',
          ],
          37 => [
            'name' => 'Perinthalmanna',
            'ID' => '38',
            'name_mal' => 'പെരിന്തൽമണ്ണ',
          ],
          38 => [
            'name' => 'Mankada',
            'ID' => '39',
            'name_mal' => 'മങ്കട',
          ],
          39 => [
            'name' => 'Malappuram',
            'ID' => '40',
            'name_mal' => 'മലപ്പുറം',
          ],
          40 => [
            'name' => 'Vengara',
            'ID' => '41',
            'name_mal' => 'വേങ്ങര',
          ],
          41 => [
            'name' => 'Vallikkunnu',
            'ID' => '42',
            'name_mal' => 'വള്ളിക്കുന്ന്',
          ],
          42 => [
            'name' => 'Tirurangadi',
            'ID' => '43',
            'name_mal' => 'തിരൂരങ്ങാടി',
          ],
          43 => [
            'name' => 'Tanur',
            'ID' => '44',
            'name_mal' => 'താനൂർ',
          ],
          44 => [
            'name' => 'Tirur',
            'ID' => '45',
            'name_mal' => 'തിരൂർ',
          ],
          45 => [
            'name' => 'Kottakkal',
            'ID' => '46',
            'name_mal' => 'കോട്ടക്കൽ',
          ],
          46 => [
            'name' => 'Thavanur',
            'ID' => '47',
            'name_mal' => 'തവനൂർ',
          ],
          47 => [
            'name' => 'Ponnani',
            'ID' => '48',
            'name_mal' => 'പൊന്നാനി',
          ],
          48 => [
            'name' => 'Thrithala',
            'ID' => '49',
            'name_mal' => 'തൃത്താല',
          ],
          49 => [
            'name' => 'Pattambi',
            'ID' => '50',
            'name_mal' => 'പട്ടാമ്പി',
          ],
          50 => [
            'name' => 'Shornur',
            'ID' => '51',
            'name_mal' => 'ഷൊർണ്ണൂർ',
          ],
          51 => [
            'name' => 'Ottappalam',
            'ID' => '52',
            'name_mal' => 'ഒറ്റപ്പാലം',
          ],
          52 => [
            'name' => 'Kongad',
            'ID' => '53',
            'name_mal' => 'കോങ്ങാട്',
          ],
          53 => [
            'name' => 'Mannarkkad',
            'ID' => '54',
            'name_mal' => 'മണ്ണാർക്കാട്',
          ],
          54 => [
            'name' => 'Malampuzha',
            'ID' => '55',
            'name_mal' => 'മലമ്പുഴ',
          ],
          55 => [
            'name' => 'Palakkad',
            'ID' => '56',
            'name_mal' => 'പാലക്കാട്',
          ],
          56 => [
            'name' => 'Tarur',
            'ID' => '57',
            'name_mal' => 'തരൂർ',
          ],
          57 => [
            'name' => 'Chittur',
            'ID' => '58',
            'name_mal' => 'ചിറ്റൂർ',
          ],
          58 => [
            'name' => 'Nenmara',
            'ID' => '59',
            'name_mal' => 'നെന്മാറ',
          ],
          59 => [
            'name' => 'Alathur',
            'ID' => '60',
            'name_mal' => 'ആലത്തൂർ',
          ],
          60 => [
            'name' => 'Chelakkara',
            'ID' => '61',
            'name_mal' => 'ചേലക്കര',
          ],
          61 => [
            'name' => 'Kunnamkulam',
            'ID' => '62',
            'name_mal' => 'കുന്നംകുളം',
          ],
          62 => [
            'name' => 'Guruvayoor',
            'ID' => '63',
            'name_mal' => 'ഗുരുവായൂർ',
          ],
          63 => [
            'name' => 'Manalur',
            'ID' => '64',
            'name_mal' => 'മണലൂർ',
          ],
          64 => [
            'name' => 'Wadakkanchery',
            'ID' => '65',
            'name_mal' => 'വടക്കാഞ്ചേരി',
          ],
          65 => [
            'name' => 'Ollur',
            'ID' => '66',
            'name_mal' => 'ഒല്ലൂർ',
          ],
          66 => [
            'name' => 'Thrissur',
            'ID' => '67',
            'name_mal' => 'തൃശ്ശൂർ',
          ],
          67 => [
            'name' => 'Nattika',
            'ID' => '68',
            'name_mal' => 'നാട്ടിക',
          ],
          68 => [
            'name' => 'Kaipamangalam',
            'ID' => '69',
            'name_mal' => 'കൈപ്പമംഗലം',
          ],
          69 => [
            'name' => 'Irinjalakuda',
            'ID' => '70',
            'name_mal' => 'ഇരിങ്ങാലക്കുട',
          ],
          70 => [
            'name' => 'Puthukkad',
            'ID' => '71',
            'name_mal' => 'പുതുക്കാട്',
          ],
          71 => [
            'name' => 'Chalakudy',
            'ID' => '72',
            'name_mal' => 'ചാലക്കുടി',
          ],
          72 => [
            'name' => 'Kodungallur',
            'ID' => '73',
            'name_mal' => 'കൊടുങ്ങല്ലൂർ',
          ],
          73 => [
            'name' => 'Perumbavoor',
            'ID' => '74',
            'name_mal' => 'പെരുമ്പാവൂർ',
          ],
          74 => [
            'name' => 'Angamaly',
            'ID' => '75',
            'name_mal' => 'അങ്കമാലി',
          ],
          75 => [
            'name' => 'Aluva',
            'ID' => '76',
            'name_mal' => 'ആലുവ',
          ],
          76 => [
            'name' => 'Kalamassery',
            'ID' => '77',
            'name_mal' => 'കളമശ്ശേരി',
          ],
          77 => [
            'name' => 'Paravur',
            'ID' => '78',
            'name_mal' => 'പറവൂർ',
          ],
          78 => [
            'name' => 'Vypeen',
            'ID' => '79',
            'name_mal' => 'വൈപ്പിൻ',
          ],
          79 => [
            'name' => 'Kochi',
            'ID' => '80',
            'name_mal' => 'കൊച്ചി',
          ],
          80 => [
            'name' => 'Thrippunithura',
            'ID' => '81',
            'name_mal' => 'തൃപ്പൂണിത്തുറ',
          ],
          81 => [
            'name' => 'Ernakulam',
            'ID' => '82',
            'name_mal' => 'എറണാകുളം',
          ],
          82 => [
            'name' => 'Thrikkakara',
            'ID' => '83',
            'name_mal' => 'തൃക്കാക്കര',
          ],
          83 => [
            'name' => 'Kunnathunad',
            'ID' => '84',
            'name_mal' => 'കുന്നത്തുനാട്',
          ],
          84 => [
            'name' => 'Piravom',
            'ID' => '85',
            'name_mal' => 'മൂവാറ്റുപുഴ',
          ],
          85 => [
            'name' => 'Muvattupuzha',
            'ID' => '86',
            'name_mal' => 'കോതമംഗലം',
          ],
          86 => [
            'name' => 'Kothamangalam',
            'ID' => '87',
            'name_mal' => 'ദേവികുളം',
          ],
          87 => [
            'name' => 'Devikulam',
            'ID' => '88',
            'name_mal' => 'പിറവം',
          ],
          88 => [
            'name' => 'Udumbanchola',
            'ID' => '89',
            'name_mal' => 'ഉടുമ്പൻചോല',
          ],
          89 => [
            'name' => 'Thodupuzha',
            'ID' => '90',
            'name_mal' => 'തൊടുപുഴ',
          ],
          90 => [
            'name' => 'Idukki',
            'ID' => '91',
            'name_mal' => 'ഇടുക്കി',
          ],
          91 => [
            'name' => 'Peerumade',
            'ID' => '92',
            'name_mal' => 'പീരുമേട്',
          ],
          92 => [
            'name' => 'Pala',
            'ID' => '93',
            'name_mal' => 'പാല',
          ],
          93 => [
            'name' => 'Kaduthuruthy',
            'ID' => '94',
            'name_mal' => 'കടുത്തുരുത്തി',
          ],
          94 => [
            'name' => 'Vaikom',
            'ID' => '95',
            'name_mal' => 'വൈക്കം',
          ],
          95 => [
            'name' => 'Ettumanoor',
            'ID' => '96',
            'name_mal' => 'ഏറ്റുമാനൂർ',
          ],
          96 => [
            'name' => 'Kottayam',
            'ID' => '97',
            'name_mal' => 'കോട്ടയം',
          ],
          97 => [
            'name' => 'Puthuppally',
            'ID' => '98',
            'name_mal' => 'പുതുപ്പള്ളി',
          ],
          98 => [
            'name' => 'Changanassery',
            'ID' => '99',
            'name_mal' => 'ചങ്ങനാശ്ശേരി',
          ],
          99 => [
            'name' => 'Kanjirappally',
            'ID' => '100',
            'name_mal' => 'കാഞ്ഞിരപ്പള്ളി',
          ],
          100 => [
            'name' => 'Poonjar',
            'ID' => '101',
            'name_mal' => 'പൂഞ്ഞാർ',
          ],
          101 => [
            'name' => 'Aroor',
            'ID' => '102',
            'name_mal' => 'അരൂർ',
          ],
          102 => [
            'name' => 'Cherthala',
            'ID' => '103',
            'name_mal' => 'ചേർത്തല',
          ],
          103 => [
            'name' => 'Alappuzha',
            'ID' => '104',
            'name_mal' => 'ആലപ്പുഴ',
          ],
          104 => [
            'name' => 'Ambalappuzha',
            'ID' => '105',
            'name_mal' => 'അമ്പലപ്പുഴ',
          ],
          105 => [
            'name' => 'Kuttanad',
            'ID' => '106',
            'name_mal' => 'കുട്ടനാട്',
          ],
          106 => [
            'name' => 'Haripad',
            'ID' => '107',
            'name_mal' => 'ഹരിപ്പാട്',
          ],
          107 => [
            'name' => 'Kayamkulam',
            'ID' => '108',
            'name_mal' => 'കായംകുളം',
          ],
          108 => [
            'name' => 'Mavelikkara',
            'ID' => '109',
            'name_mal' => 'മാവേലിക്കര',
          ],
          109 => [
            'name' => 'Chengannur',
            'ID' => '110',
            'name_mal' => 'ചെങ്ങന്നൂർ',
          ],
          110 => [
            'name' => 'Thiruvalla',
            'ID' => '111',
            'name_mal' => 'തിരുവല്ല',
          ],
          111 => [
            'name' => 'Ranni',
            'ID' => '112',
            'name_mal' => 'റാന്നി',
          ],
          112 => [
            'name' => 'Aranmula',
            'ID' => '113',
            'name_mal' => 'ആറന്മുള',
          ],
          113 => [
            'name' => 'Konni',
            'ID' => '114',
            'name_mal' => 'കോന്നി',
          ],
          114 => [
            'name' => 'Adoor',
            'ID' => '115',
            'name_mal' => 'അടൂർ',
          ],
          115 => [
            'name' => 'Karunagapally',
            'ID' => '116',
            'name_mal' => 'കരുനാഗപ്പള്ളി',
          ],
          116 => [
            'name' => 'Chavara',
            'ID' => '117',
            'name_mal' => 'ചവറ',
          ],
          117 => [
            'name' => 'Kunnathur',
            'ID' => '118',
            'name_mal' => 'കുന്നത്തൂർ',
          ],
          118 => [
            'name' => 'Kottarakkara',
            'ID' => '119',
            'name_mal' => 'കൊട്ടാരക്കര',
          ],
          119 => [
            'name' => 'Pathanapuram',
            'ID' => '120',
            'name_mal' => 'പത്തനാപുരം',
          ],
          120 => [
            'name' => 'Punalur',
            'ID' => '121',
            'name_mal' => 'പുനലൂർ',
          ],
          121 => [
            'name' => 'Chadayamangalam',
            'ID' => '122',
            'name_mal' => 'ചടയമംഗലം',
          ],
          122 => [
            'name' => 'Kundara',
            'ID' => '123',
            'name_mal' => 'കുണ്ടറ',
          ],
          123 => [
            'name' => 'Kollam',
            'ID' => '124',
            'name_mal' => 'കൊല്ലം',
          ],
          124 => [
            'name' => 'Eravipuram',
            'ID' => '125',
            'name_mal' => 'ഇരവിപുരം',
          ],
          125 => [
            'name' => 'Chathannoor',
            'ID' => '126',
            'name_mal' => 'ചാത്തന്നൂർ',
          ],
          126 => [
            'name' => 'Varkala',
            'ID' => '127',
            'name_mal' => 'വർക്കല',
          ],
          127 => [
            'name' => 'Attingal',
            'ID' => '128',
            'name_mal' => 'ആറ്റിങ്ങൽ',
          ],
          128 => [
            'name' => 'Chirayinkeezhu',
            'ID' => '129',
            'name_mal' => 'ചിറയിൻകീഴ്',
          ],
          129 => [
            'name' => 'Nedumangad',
            'ID' => '130',
            'name_mal' => 'നെടുമങ്ങാട്',
          ],
          130 => [
            'name' => 'Vamanapuram',
            'ID' => '131',
            'name_mal' => 'വാമനപുരം',
          ],
          131 => [
            'name' => 'Kazhakkoottam',
            'ID' => '132',
            'name_mal' => 'കഴക്കൂട്ടം',
          ],
          132 => [
            'name' => 'Vattiyoorkavu',
            'ID' => '133',
            'name_mal' => 'വട്ടിയൂർക്കാവ്',
          ],
          133 => [
            'name' => 'Thiruvananthapuram',
            'ID' => '134',
            'name_mal' => 'തിരുവനന്തപുരം',
          ],
          134 => [
            'name' => 'Nemom',
            'ID' => '135',
            'name_mal' => 'നേമം',
          ],
          135 => [
            'name' => 'Aruvikkara',
            'ID' => '136',
            'name_mal' => 'അരുവിക്കര',
          ],
          136 => [
            'name' => 'Parassala',
            'ID' => '137',
            'name_mal' => 'പാറശ്ശാല',
          ],
          137 => [
            'name' => 'Kattakkada',
            'ID' => '138',
            'name_mal' => 'കാട്ടാക്കട',
          ],
          138 => [
            'name' => 'Kovalam',
            'ID' => '139',
            'name_mal' => 'കോവളം',
          ],
          139 => [
            'name' => 'Neyyattinkara',
            'ID' => '140',
            'name_mal' => 'നെയ്യാറ്റിൻകര',
          ],
        ];

        Constituency::insert($cons);
    }
}
