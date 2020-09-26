<?php

namespace App\Http\Controllers;

use App\Models\GamerModel;
use App\Models\GamerRozetArchivesModel;
use App\Models\RankModel;

class RozetSystem extends Controller
{
    #Oyuncuya ait rank verisini günceller. Rank yoksa yeni bir rank atar. Varsa kontrol eder.
    # Şu an ki sistem win sayısına göre çalışıyor.

    # Rank seviyeini kontrol ediyor. Yeniyse yeni rank veriyor. Eğer rank varsa şarta göre guncelliyor.
    public function rozetControl($username,$game=0)
    {
        $rozetList = new RankModel();
        $gamers = GamerModel::select('*')->get();
        $gamerRozet = new GamerRozetArchivesModel();
        if($game)
        {
        	$gamers = GamerModel::select('*')->orderBydesc('point')->get();
			#LogStart
				\App\Http\Controllers\LogSystem::add("#############################################");
			#LogEnd
			foreach ($gamers as $key => $gamer) {
				$rozets = GamerRozetArchivesModel::select('*')->where('name',$gamer->name)->first();
				if($key==0)
				{
					$gamer->name;
					$newRozet = new GamerRozetArchivesModel();
					
					if(!$rozets)
					{
						$newRozet->name = $gamer->name;
						$newRozet->rozet_name = "eniyi";
						$newRozet->save();
					}
					else
					{
						$rozets->rozet_name = "eniyi";
						$rozets->save();
					}
					#LogStart
						\App\Http\Controllers\LogSystem::add($gamer->name." yeni rozeti :"."En iyi oyuncu");
					#LogEnd
					continue;
				}
				elseif($key>0 && $key<=4)
				{
					$newRozet = new GamerRozetArchivesModel();
					if(!$rozets)
					{
						$newRozet->name = $gamer->name;
						$newRozet->rozet_name = "eniyi5";
						$newRozet->save();
					}
					else
					{
						$rozets->rozet_name = "eniyi5";
						$rozets->save();
					}
					#LogStart
						\App\Http\Controllers\LogSystem::add($gamer->name." yeni rozeti :"."En 5 oyuncu");
					#LogEnd
					continue;
				}
				elseif($key>4 && $key<=9)
				{
					$newRozet = new GamerRozetArchivesModel();
					if(!$rozets)
					{
						$newRozet->name = $gamer->name;
						$newRozet->rozet_name = "eniyi10";
						$newRozet->save();
					}
					else
					{
						$rozets->rozet_name = "eniyi10";
						$rozets->save();
					}
					#LogStart
						\App\Http\Controllers\LogSystem::add($gamer->name." yeni rozeti :"."En 10 oyuncu");
					#LogEnd
					continue;
				}
				elseif($key >= 10){
				    $newRozet = new GamerRozetArchivesModel();
					if(!$rozets){
					    $newRozet->name = $gamer->name;
						$newRozet->rozet_name = "tr";
						$newRozet->save();
					}
					else
					{
						$rozets->rozet_name = "tr";
						$rozets->save();
					}
					continue;
				}
			}

		
            // Rozet almak için uygun mu ?.
            $rozet = $rozetList->select('*')->where('rType',"rozet")->where('ranked_point',"<=",$game)->first();

            if(isset($rozet->code))
            {
                // Aynı rozetten iki tane kaydetmesini engellemek için.
                $newRozetCount = $gamerRozet->select('*')->where('rozet_name',$rozet->code)->count();
                if($newRozetCount==0)
                {
                    $gamerRozet->name = $username;
                    $gamerRozet->rozet_name = $rozet->code;
                    $gamerRozet->save();
                    #LogStart
                        \App\Http\Controllers\LogSystem::add($gamerRozet->name." yeni rozeti :".$rozet->code);
                    #LogEnd
                }
            }        		
            #LogStart
				\App\Http\Controllers\LogSystem::add("#############################################");
			#LogEnd
        }

        return;
    }
}
