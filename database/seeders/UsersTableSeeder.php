<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'team_details'    => '',
                'password'       => bcrypt('password'),
                'remember_token' => null,

            ],
            [
            'id'             => 2,
            'name'           => 'Team 1',
            'email'          => 'team1@klibf.com',
            'team_details'          => 'ശ്രീ. റോമി ജോണ്‍സണ്‍ സേവ്യര്‍ -സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9495155954 / 8848672887
ശ്രീമതി ഗായത്രി എസ്., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ് -II - 9633297661
ശ്രീ. രതീപ് എ. ആര്‍., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് -II - 9946177704',
            'password'       => bcrypt('js60'),
            'remember_token' => null,
        ],
[
            'id'             => 3,
            'name'           => 'Team 2',
            'email'          => 'team2@klibf.com',
            'team_details'          => 'ശ്രീ. ആനന്ദ് കെ., സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9446602424 / 9544973730
ശ്രീമതി അഖില എസ്., മോഹന്‍ റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ് - II - 9747728229
ശ്രീമതി രോഹിണി വി. എസ്., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് - II - 9809482187',
            'password'       => bcrypt('96pt'),
            'remember_token' => null,
        ],
[
            'id'             => 4,
            'name'           => 'Team 3',
            'email'          => 'team3@klibf.com',
            'team_details'          => 'ശ്രീമതി മഞ്ചു സുദര്‍ശന്‍, സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9745450660
ശ്രീമതി ആഷ കരുണാകരൻ, റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ് -II - 9947699290
ശ്രീമതി ഷജീന എന്‍., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് - II - 6238080369',
            'password'       => bcrypt('rsfy'),
            'remember_token' => null,
        ],
[
            'id'             => 5,
            'name'           => 'Team 4',
            'email'          => 'team4@klibf.com',
            'team_details'          => 'ശ്രീ. സി. റ്റി. രമേഷ് ബാബു, സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9446012014
ശ്രീ. ഷൈജു തോമസ്, റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ് -II - 9447789765
ശ്രീമതി ശരണ്യ സുരേഷ്, കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് - II - ',
            'password'       => bcrypt('0qwx'),
            'remember_token' => null,
        ],
[
            'id'             => 6,
            'name'           => 'Team 5',
            'email'          => 'team5@klibf.com',
            'team_details'          => 'ശ്രീമതി അമ്പിളി വി., സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 8547195187
ശ്രീമതി അശ്വതി ആര്‍., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-II - 8075290754
ശ്രീമതി സിന്ധു എം. എസ്., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് - II - 9747621849',
            'password'       => bcrypt('5ee0'),
            'remember_token' => null,
        ],
[
            'id'             => 7,
            'name'           => 'Team 6',
            'email'          => 'team6@klibf.com',
            'team_details'          => 'ശ്രീമതി ലിഷ സി. എ., സെക്ഷന്‍ ഓഫീസര്‍(ഹയര്‍ ഗ്രേഡ്) - 9446848950
ശ്രീമതി രേഷ്‍മ ആര്‍. ആര്‍., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-II - 6282463346
ശ്രീമതി സ്വാതി ജെ. എസ്., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് - II - 9961289763',
            'password'       => bcrypt('j10s'),
            'remember_token' => null,
        ],
[
            'id'             => 8,
            'name'           => 'Team 7',
            'email'          => 'team7@klibf.com',
            'team_details'          => 'ശ്രീമതി ശ്രീദേവി എസ്., സെക്ഷന്‍ ഓഫീസര്‍(ഹയര്‍ ഗ്രേഡ്) - 9447273662
ശ്രീമതി സഹീറ ആര്‍., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 7510909261
ശ്രീമതി സ്നേഹഷാ എസ്. എല്‍., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് - II - 8137913396 / 9745436362',
            'password'       => bcrypt('qpla'),
            'remember_token' => null,
        ],
[
            'id'             => 9,
            'name'           => 'Team 8',
            'email'          => 'team8@klibf.com',
            'team_details'          => 'ശ്രീ. അനസ് എം. ബി., സെക്ഷന്‍ ഓഫീസര്‍(ഹയര്‍ ഗ്രേഡ്) - 9048025007
ശ്രീമതി ഗീത റ്റി. ബി., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-II - 9946846140
ശ്രീമതി നന്ദു പ്രഭ, അസിസ്റ്റന്റ് - 9400043092',
            'password'       => bcrypt('blf9'),
            'remember_token' => null,
        ],
[
            'id'             => 10,
            'name'           => 'Team 9',
            'email'          => 'team9@klibf.com',
            'team_details'          => 'ശ്രീ. അനില്‍ എസ്. കെ., സെക്ഷന്‍ ഓഫീസര്‍(ഹയര്‍ ഗ്രേഡ്) - 9495376305
ശ്രീമതി ഭവിതാ ലാല്‍ ബി. എല്‍., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-II - 9656570620
ശ്രീമതി സരിഗ എസ്. ആര്‍., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് - II - 6238747447',
            'password'       => bcrypt('v3up'),
            'remember_token' => null,
        ],
[
            'id'             => 11,
            'name'           => 'Team 10',
            'email'          => 'team10@klibf.com',
            'team_details'          => 'ശ്രീ. ശിവപ്രകാശ് എസ്., സെക്ഷന്‍ ഓഫീസര്‍ - 9961569989
ശ്രീമതി ലിജി എല്‍. ജെ. റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 7736259422
ശ്രീമതി മഞ്ജു എസ്. നാഥ് , കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് സെലക്ഷന്‍ ഗ്രേഡ് - 8921633367',
            'password'       => bcrypt('pmya'),
            'remember_token' => null,
        ],
[
            'id'             => 12,
            'name'           => 'Team 11',
            'email'          => 'team11@klibf.com',
            'team_details'          => 'ശ്രീമതി ജയശ്രീ സി. ആര്‍., സെക്ഷന്‍ ഓഫീസര്‍ - 9446310325
ശ്രീമതി പത്മാവതി എസ്. ആര്‍., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 9495614743
ശ്രീമതി ജയശ്രീ വി. ആര്‍., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് സെലക്ഷന്‍ ഗ്രേഡ് - 8943939547',
            'password'       => bcrypt('emeh'),
            'remember_token' => null,
        ],
[
            'id'             => 13,
            'name'           => 'Team 12',
            'email'          => 'team12@klibf.com',
            'team_details'          => 'ശ്രീ. ഷാജി ആര്‍. വിക്ടര്‍, സെക്ഷന്‍ ഓഫീസര്‍ - 9447587964
ശ്രീ. ശരത് എസ്. പി., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 9495124099
ശ്രീ. കാര്‍ത്തികേയന്‍ നായര്‍, കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് സീനിയര്‍ ഗ്രേഡ് - 9285478727',
            'password'       => bcrypt('tfym'),
            'remember_token' => null,
        ],
[
            'id'             => 14,
            'name'           => 'Team 13',
            'email'          => 'team13@klibf.com',
            'team_details'          => 'ശ്രീമതി റീജാ ബീഗം, സെക്ഷന്‍ ഓഫീസര്‍ - 9947974404
ശ്രീമതി വിനീത കെ. ആര്‍., സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 7594834401
ശ്രീമതി ശ്രീലക്ഷ്മി എസ്. എസ്., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് സീനിയര്‍ ഗ്രേഡ് - 8281988904',
            'password'       => bcrypt('7nq2'),
            'remember_token' => null,
        ],
[
            'id'             => 15,
            'name'           => 'Team 14',
            'email'          => 'team14@klibf.com',
            'team_details'          => 'ശ്രീമതി ബിന്ദു എസ്., സെക്ഷന്‍ ഓഫീസര്‍ - 9446012823
ശ്രീമതി രാജലക്ഷ്മി വി. എസ്., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 9495300683
ശ്രീമതി സ്വപ്ന ഇ. വി., അസിസ്റ്റന്റ് - 9745548660',
            'password'       => bcrypt('5jwr'),
            'remember_token' => null,
        ],
[
            'id'             => 16,
            'name'           => 'Team 15',
            'email'          => 'team15@klibf.com',
            'team_details'          => 'ശ്രീമതി സ്മിതാദാസ് വി., സെക്ഷന്‍ ഓഫീസര്‍ - 9048366640
ശ്രീമതി റീന എ., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 7510563828
ശ്രീമതി സൗമ്യ എല്‍., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് സീനിയര്‍ ഗ്രേഡ് - 9496888926',
            'password'       => bcrypt('f8jv'),
            'remember_token' => null,
        ],
[
            'id'             => 17,
            'name'           => 'Team 16',
            'email'          => 'team16@klibf.com',
            'team_details'          => 'ശ്രീമതി ലതാകുമാരി കെ. എസ്., സെക്ഷന്‍ ഓഫീസര്‍ - 8547586768
ശ്രീമതി അമ്പിളിദേവ് ഡി. എസ്., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 9656256652
ശ്രീമതി റീന എ., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ്-I - 7510482632',
            'password'       => bcrypt('25yr'),
            'remember_token' => null,
        ],
[
            'id'             => 18,
            'name'           => 'Team 17',
            'email'          => 'team17@klibf.com',
            'team_details'          => 'ശ്രീ. ഗോപന്‍ പി. ആര്‍., സെക്ഷന്‍ ഓഫീസര്‍ - 9446840210
ശ്രീമതി സൗമ്യ എസ്. എസ്., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 9744482181
ശ്രീമതി ധന്യ ആര്‍. നായര്‍, കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ്-I - 8139802338',
            'password'       => bcrypt('p1w1'),
            'remember_token' => null,
        ],
[
            'id'             => 19,
            'name'           => 'Team 18',
            'email'          => 'team18@klibf.com',
            'team_details'          => 'ശ്രീ. ജെയ്സ് റ്റി. ലൂക്കോസ്, സെക്ഷന്‍ ഓഫീസര്‍ - 9496843271
ശ്രീമതി സന്ധ്യ എസ്., റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 9995680205
ശ്രീ. റിങ്കു മഹേഷ് സി., സീനിയര്‍ ഗ്രേഡ് അസിസ്റ്റന്റ് - 6238222013',
            'password'       => bcrypt('f13i'),
            'remember_token' => null,
        ],
[
            'id'             => 20,
            'name'           => 'Team 19',
            'email'          => 'team19@klibf.com',
            'team_details'          => 'ശ്രീമതി സൂര്യ എസ്. ആര്‍., സെക്ഷന്‍ ഓഫീസര്‍ - 9497274054
ശ്രീമതി ശരണ്യ സിദ്ധാര്‍ത്ഥന്‍, റിപ്പോര്‍ട്ടര്‍ ഗ്രേഡ്-I - 9447571907
ശ്രീമതി സാലി ഷൈനോജ്, സീനിയര്‍ ഗ്രേഡ് അസിസ്റ്റന്റ് - 8289949091',
            'password'       => bcrypt('srbd'),
            'remember_token' => null,
        ],
[
            'id'             => 21,
            'name'           => 'Team 20',
            'email'          => 'team20@klibf.com',
            'team_details'          => 'ശ്രീ. അംജാദ് ബി. എസ്., സെക്ഷന്‍ ഓഫീസര്‍ - 9995661064
ശ്രീമതി ലിസി ഡിക്രൂസ്, സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 9446341037
ശ്രീമതി മിനി ആര്‍., അസിസ്റ്റന്റ് - 9846650681',
            'password'       => bcrypt('v0vh'),
            'remember_token' => null,
        ],
[
            'id'             => 22,
            'name'           => 'Team 21',
            'email'          => 'team21@klibf.com',
            'team_details'          => 'ശ്രീമതി അമൃത കെ. പി, സെക്ഷന്‍ ഓഫീസര്‍ - 9400727496
ശ്രീമതി അമൃത എ., സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 8921578755
ശ്രീ. ഗോപകുമാര്‍ ജി., അസിസ്റ്റന്റ് - 9947250560',
            'password'       => bcrypt('721o'),
            'remember_token' => null,
        ],
[
            'id'             => 23,
            'name'           => 'Team 22',
            'email'          => 'team22@klibf.com',
            'team_details'          => 'ശ്രീ. ഷിഹാബുദ്ദീന്‍, സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9447887186
ശ്രീ. അജിത് എസ്.പി., സെലക്ഷന്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 9497266057
ശ്രീ. വിക്രമന്‍ സി., ക്ലറിക്കല്‍ അസിസ്റ്റന്റ് - 8547634378',
            'password'       => bcrypt('6628'),
            'remember_token' => null,
        ],
[
            'id'             => 24,
            'name'           => 'Team 23',
            'email'          => 'team23@klibf.com',
            'team_details'          => 'ശ്രീ. അജിത്ത്കുമാര്‍ വി. ഒ., സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9400155255
ശ്രീമതി സ്വപ്ന എസ്. നായര്‍, സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 9895145479
ശ്രീ. ജി. എസ്. അനില്‍ കുമാര്‍, ക്ലറിക്കല്‍ അസിസ്റ്റന്റ് - 8921518176',
            'password'       => bcrypt('tt5c'),
            'remember_token' => null,
        ],
[
            'id'             => 25,
            'name'           => 'Team 24',
            'email'          => 'team24@klibf.com',
            'team_details'          => 'ശ്രീമതി സുനിത സി., സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9048748767
ശ്രീമതി മിനി എസ്. എസ്., സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 9497453046
ശ്രീമതി ബിന്ദു ആര്‍., ക്ലറിക്കല്‍ അസിസ്റ്റന്റ് - 8547474639',
            'password'       => bcrypt('5zh9'),
            'remember_token' => null,
        ],
[
            'id'             => 26,
            'name'           => 'Team 25',
            'email'          => 'team25@klibf.com',
            'team_details'          => 'ശ്രീ. സുഭാഷ് പി., സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9447145921
ശ്രീ. ബിന്ദുമോള്‍ ബി. പി., സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 9400723995
ശ്രീ. അസീം എ., കമ്പ്യൂട്ടര്‍ അസിസ്റ്റന്റ് ഗ്രേഡ് II - 9496152582',
            'password'       => bcrypt('aabn'),
            'remember_token' => null,
        ],
[
            'id'             => 27,
            'name'           => 'Team 26',
            'email'          => 'team26@klibf.com',
            'team_details'          => 'ശ്രീ. സാചി റ്റി. പി., സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9446620608
ശ്രീമതി ആര്‍. ഷീബ, സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 9539896940
ശ്രീമതി നീതു എലിസബത്ത്, സീനിയര്‍ ഗ്രേഡ് അസിസ്റ്റന്റ് - 9497342182',
            'password'       => bcrypt('z200'),
            'remember_token' => null,
        ],
[
            'id'             => 28,
            'name'           => 'Team 27',
            'email'          => 'team27@klibf.com',
            'team_details'          => 'ശ്രീ. അബ്ദുള്‍ മജീദ് റ്റി. പി., സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9447583972
ശ്രീമതി കാദംബരി വി., സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 9037941878
ശ്രീമതി സബിത കെ., അസിസ്റ്റന്റ് സെക്ഷന്‍ ഓഫീസര്‍ - 9497690012',
            'password'       => bcrypt('13ya'),
            'remember_token' => null,
        ],
[
'id'             => 29,
'name'           => 'Team 28',
'email'          => 'team28@klibf.com',
'team_details'          => 'ശ്രീ. ഷീന കെ., സെക്ഷന്‍ ഓഫീസര്‍ (ഹയര്‍ ഗ്രേഡ്) - 9495008830
ശ്രീ. കിഷോര്‍ ജി., സീനിയര്‍ ഗ്രേഡ് റിപ്പോര്‍ട്ടര്‍ - 9446567636
ശ്രീമതി ഷൈന എസ്. എല്‍., അസിസ്റ്റന്റ് സെക്ഷന്‍ ഓഫീസര്‍ - 9446305522',
'password'       => bcrypt('of46'),
'remember_token' => null,
],
        ];

        User::insert($users);
    }
}
