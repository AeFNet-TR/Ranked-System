<?php

namespace App\Http\Controllers;

use App\Models\GamerModel;
use App\Models\RankModel;
use App\Models\MatchModel;
use App\Models\PlayerDataModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $GameData = new Game();
        $Players = new GamerModel();
        $ranks = RankModel::select('*')->where('rType','rank')->orderBy('order')->get();
        $allmatch = $GameData->allmatch(4);
        $allplayer = $Players::select('*')->orderBydesc('point')->Paginate(45);
        $lastgamecount = MatchModel::select('*')->where('epoch_time',">=",Carbon::now()->timestamp-86400)->count();
        $lastqueued = MatchModel::select('*')->where('epoch_time',">=",Carbon::now()->timestamp-3600)->count();
        $lasthoursgamecount = GamerModel::select('*')->whereDate('created_at',Carbon::today())->get()->count();

        return  view('app')
                ->with('matchs',$allmatch)
                ->with('players',$allplayer)
                ->with('lastgamecount', $lastgamecount)
                ->with('lastqueued',$lastqueued)
                ->with('lasthoursgamecount', $lasthoursgamecount)
                ->with('ranks',$ranks)
                ->with('page',"index");
    }

    public function game($gameid=null)
    {
        $GameData = new Game();

        $matchData = $GameData->index($gameid);

        $p1rank = null;
        $p2rank = null;

       /* $players = explode(",",$matchData->player_data);*/

        $player1Data = PlayerDataModel::select('*')->where("player_data_code",$matchData->p1_data)->first(); //->UnitsBought->UnitsLost->UnitsKilled->PlanesLost->PlanesKilled->PlanesBought->InfantryLost->InfantryKilled->InfantryBought->BuildingsLost->BuildingsKilled->BuildingsCaptured->BuildingsBought
        if($player1Data)
            $p1rank = $GameData->getRanking($player1Data->name);
        $player2Data = PlayerDataModel::select('*')->where("player_data_code",$matchData->p2_data)->first();
        if($player2Data)
            $p2rank = $GameData->getRanking($player2Data->name);

        return  view('app')
                ->with('page',"match")
                ->with('match',$matchData)
                ->with('p1rank',$p1rank)
                ->with('p2rank',$p2rank)
                ->with('p1',$player1Data)
                ->with('p2',$player2Data);
    }

    public function profile($gamernick=null)
    {
        $MatchData = new Game();

        $matchs = $MatchData->gamermatch($gamernick);

        $playerData = GamerModel::select('*')->where('name',$gamernick)->first();
        return  view('app')
                ->with('matchs',$matchs)
                ->with('player',$playerData)
                ->with('rank',$MatchData->getRanking($gamernick))
                ->with('page',"profile");
    }

    public function allmatch()
    {
        $GameData = new Game();
        $allmatch = $GameData->allmatch();
        return  view('app')
                ->with('page',"allmatch")
                ->with('allmatch',$allmatch);
    }
    public function jsontransfer()
    {
        $Core = new CoreController();
        

        #LogStart
            \App\Http\Controllers\LogSystem::add("Json transferi tetiklendi.");
        #LogEnd

        $Core->start();
        
        /*
            Map listesi girilecek.
            Rütbe hesaplama yapılacak.
            Maç kaydederken verilecek puanlar hesaplanıp gamer'a eklenecek.
            Maç verileri eklenirken. Kullanıcı rütbesi güncellenecek.

        */
    }
}
