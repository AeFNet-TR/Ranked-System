<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class side extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [[
            'code' => 'um',
            'name' => 'America',
            'side' => 'Müttefik',
            'created_at' => now()
        ],[
            'code' => 'kr',
            'name' => 'Korea',
            'side' => 'Müttefik',
            'created_at' => now()
        ],[
            'code' => 'fr',
            'name' => 'France',
            'side' => 'Müttefik',
            'created_at' => now()
        ],[
            'code' => 'de',
            'name' => 'Germany',
            'side' => 'Müttefik',
            'created_at' => now()
        ],[
            'code' => 'gb',
            'name' => 'Great Britain',
            'side' => 'Müttefik',
            'created_at' => now()
        ],[
            'code' => 'iq',
            'name' => 'Iraq',
            'side' => 'Sovyet',
            'created_at' => now()
        ],[
            'code' => 'cu',
            'name' => 'Cuba',
            'side' => 'Sovyet',
            'created_at' => now()
        ],[
            'code' => 'ly',
            'name' => 'Libya',
            'side' => 'Sovyet',
            'created_at' => now()
        ],[
            'code' => 'ru',
            'name' => 'Russia',
            'side' => 'Sovyet',
            'created_at' => now()
        ],[
            'code' => 'yuri',
            'name' => 'Yuri',
            'side' => 'Yuri',
            'created_at' => now()
        ]];
        foreach ($items as $key => $value) {
            DB::table('side')->insert($value);
        }
    }
}

