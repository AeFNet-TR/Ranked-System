<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GamerModel;
use App\Models\MatchModel;

class PointSystem extends Controller
{
    
    public function Point($Player)
    {
        $gamer = new GamerModel(); // 1 oyuncuya aıt tum verı ıcı
        $player1 = $gamer::select('*')->where('name',$Player->p1->name)->first();
        $player2 = $gamer::select('*')->where('name',$Player->p2->name)->first();
        $win=[];
        if($p1->won){
            $win['p1']=1;
            $win['p2']=0;
        }
        else
        {
            $win['p2']=1;
            $win['p1']=0;
        }
        if(empty($player1->point))
        {
            $p1point=0;
        }
        else
        {
            $p1point = $player1->point;
        }
        if(empty($player2->point)){
            $p2point=0;
        }
        else
        {
            $p2point = $player2->point;
        }
        $KFACTOR = 64;
        
        $newpointa = $p1point + ( $KFACTOR * ($win['p1'] - (1 / (1 + (pow(10, ($p2point - $p1point) / 400))))));
        $newpointb = $p2point + ( $KFACTOR * ($win['p2'] - (1 / (1 + (pow(10, ($p1point - $p2point) / 400))))));

        $matchpointa = $newpointa - $p1point;
        $matchpointb = $newpointb - $p2point;
        
        echo $matchpointa;
    }
}