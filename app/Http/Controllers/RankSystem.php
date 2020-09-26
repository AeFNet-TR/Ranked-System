<?php

namespace App\Http\Controllers;

use App\Models\GamerModel;
use App\Models\GamerRankArchivesModel;
use App\Models\RankModel;

class RankSystem extends Controller
{
    #Oyuncuya ait rank verisini günceller. Rank yoksa yeni bir rank atar. Varsa kontrol eder.
    # Şu an ki sistem win sayısına göre çalışıyor.

    # Rank seviyeini kontrol ediyor. Yeniyse yeni rank veriyor. Eğer rank varsa şarta göre guncelliyor.
    public function rankControl($username,$win=0)
    {
        $rankList = new RankModel();
        $gamer = new GamerModel();
        $gamerRank = new GamerRankArchivesModel();

        $oldRank = $gamerRank::select('*')->where('name',$username)->first();

        if(empty($oldRank))
        {
            $yeniRutbe = $gamerRank;
            $yeniRutbe->name=$username;
            $yeniRutbe->rank_name = $rankList->select('code')->where('rType','rank')->where('ranked_point',"<=",$win)->orderBydesc('order')->first()->code;
            $yeniRutbe->save();
            #LogStart
                \App\Http\Controllers\LogSystem::add($username." ilk rütbesini aldı.");
            #LogEnd
            return;
        }
        $nowRank =  $rankList->select('*')->where('rType','rank')->where('ranked_point',"<=",$win)->orderBydesc('order')->first();

        if($oldRank->rank_name != $nowRank->code)
        {
            $yeniRutbe = $gamerRank::select('*')->where('name',$username)->first();
            $yeniRutbe->name=$username;
            $yeniRutbe->rank_name = $rankList->select('code')->where('rType','rank')->where('ranked_point',"<=",$win)->orderBydesc('order')->first()->code;
            $yeniRutbe->save();
            #LogStart
                \App\Http\Controllers\LogSystem::add($username." yeni rütbesini aldı.");
            #LogEnd
            return;
        }
        return;
    }
}
