<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class maps extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [[
            'name' => '[2] Ranked Hidden Valley LE v1.34',
            'image_url' => '2_hiddenvalley_le_134.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[2] Ranked Pinch Points LE',
            'image_url' => '2_pinchpoints_le_102.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[4] Ranked Country Swing LE',
            'image_url' => '4_countryswing_le_100.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[6] Ranked Tour of Egypt',
            'image_url' => 'TourOfEgypt.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[8] Ranked Corwick Forest',
            'image_url' => '8_corwick_forest.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[8] Mayflower',
            'image_url' => 'coldest.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[4] Ranked Deserted Mountain',
            'image_url' => 'deserted_mountain.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[4] Ranked Divide and Conquer',
            'image_url' => 'divide.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[2] Ranked Dune Patrol',
            'image_url' => 'DunePatr.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[2] Ranked Frozen Divide',
            'image_url' => 'frozendivide.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[4] Ranked Heck Freezes Over LE',
            'image_url' => 'heckle.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[2] Ranked Cloud Nine',
            'image_url' => 'procloudnine.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[2] Ranked Meatgrinder',
            'image_url' => 'progrinder.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ],[
            'name' => '[4] Ranked Snow Nitro',
            'image_url' => 'prosnownitro.png',
            'ranked_status' => 'Active',
            'created_at' => now()
        ]];
        foreach ($items as $key => $value) {
            DB::table('maps')->insert($value);
        }
    }
}
