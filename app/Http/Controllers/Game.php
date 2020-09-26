<?php

namespace App\Http\Controllers;

use App\Models\GamerModel;
use App\Models\MatchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Game extends Controller
{
    public function index($matchid)
    {
        $MatchModel = new MatchModel();
        $matchData = $MatchModel->find($matchid);
        return $matchData;
    }
    public function allmatch($count=24)
    {
        $MatchModel = new MatchModel();
        $matchData = $MatchModel->orderBydesc('epoch_time')->Paginate($count);
        return $matchData;
    }
    public function gamermatch($gamernick=null)
    {
        $MatchModel = new MatchModel();
        $matchData = $MatchModel->where('p1_data','like',"%".$gamernick."%")->orWhere('p2_data','like',"%".$gamernick."%")->orderBydesc('epoch_time')->Paginate(24);
        return $matchData;
    }

    public function getRanking($id){
        $collection = collect(GamerModel::orderBydesc('point')->get());
        $data       = $collection->where('name',$id);
        $value      = $data->keys()->first()+1;
        return $value;
    }

}
