<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rank extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $items = [[
                'code' => 'orgeneral',
                'name' => 'Orgeneral',
                'image_url' => 'badge-t9.png',
                'order' => '9',
                'ranked_point' => '100',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'korgeneral',
                'name' => 'Korgeneral',
                'image_url' => 'badge-t8.png',
                'order' => '8',
                'ranked_point' => '80',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'tumgeneral',
                'name' => 'Tümgeneral',
                'image_url' => 'badge-t7.png',
                'order' => '7',
                'ranked_point' => '70',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'tuggeneral',
                'name' => 'Tuğgeneral',
                'image_url' => 'badge-t6.png',
                'order' => '6',
                'ranked_point' => '60',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'albay',
                'name' => 'Albay',
                'image_url' => 'badge-t5.png',
                'order' => '5',
                'ranked_point' => '50',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'yarbay',
                'name' => 'Yarbay',
                'image_url' => 'badge-t4.png',
                'order' => '4',
                'ranked_point' => '40',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'binbasi',
                'name' => 'Bin Başı',
                'image_url' => 'badge-t3.png',
                'order' => '3',
                'ranked_point' => '30',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'yuzbasi',
                'name' => 'Yüz Başı',
                'image_url' => 'badge-t2.png',
                'order' => '2',
                'ranked_point' => '20',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'tegmen',
                'name' => 'Teğmen',
                'image_url' => 'badge-t1.png',
                'order' => '1',
                'ranked_point' => '10',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'yeni',
                'name' => 'Yeni',
                'image_url' => 'badge-default.png',
                'order' => '0',
                'ranked_point' => '0',
                'rType'=>"rank",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => '500oyun',
                'name' => '+500 Oyundan Fazla',
                'image_url' => 'achievement-games.png',
                'order' => '5',
                'ranked_point' => '500',
                'rType'=>"rozet",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => '400oyun',
                'name' => '+400 Oyundan Fazla',
                'image_url' => 'achievement-games.png',
                'order' => '4',
                'ranked_point' => '400',
                'rType'=>"rozet",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => '300oyun',
                'name' => '+300 Oyundan Fazla',
                'image_url' => 'achievement-games.png',
                'order' => '3',
                'ranked_point' => '300',
                'rType'=>"rozet",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => '200oyun',
                'name' => '+200 Oyundan Fazla',
                'image_url' => 'achievement-games.png',
                'order' => '2',
                'ranked_point' => '200',
                'rType'=>"rozet",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => '100oyun',
                'name' => '+100 Oyundan Fazla',
                'image_url' => 'achievement-games.png',
                'order' => '1',
                'ranked_point' => '100',
                'rType'=>"rozet",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'eniyi10',
                'name' => 'En iyi 10',
                'image_url' => 'achievement-rank10.png',
                'order' => '3',
                'ranked_point' => '100000010',
                'rType'=>"rozet",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'eniyi5',
                'name' => 'En iyi 5',
                'image_url' => 'achievement-rank5.png',
                'order' => '2',
                'ranked_point' => '100000015',
                'rType'=>"rozet",
                'ranked_status' => 'Active',
                'created_at' => now()
            ],[
                'code' => 'eniyi',
                'name' => 'En iyi oyuncu',
                'image_url' => 'achievement-rank1.png',
                'order' => '1',
                'ranked_point' => '100000020',
                'rType'=>"rozet",
                'ranked_status' => 'Active',
                'created_at' => now()
            ]];
        foreach ($items as $key => $value) {
            DB::table('rank')->insert($value);
        }
    }
}
