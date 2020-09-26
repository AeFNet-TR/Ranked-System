<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchModel extends Model
{
    protected $table = "match";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "p1_data",
        "p2_data",
        "fps",
        "local_time",
        "epoch_time",
        "player_in_game",
        "map",
        "starting_units",
        "ai_player",
        "crates",
        "build_off_ally_conyards",
        "mcv_redeploy",
        "superweapons",
        "short_game",
        "starting_credits",
        "duration",
        "finished",
        "reconnection_error",
        "p1_oyuncu",
        "p2_oyuncu",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];

    public function getMap()
    {
       return $this->hasOne('App\Models\MapsModel','name','map');
    }

    public function p1()
    {
        return $this->hasOne('App\Models\PlayerDataModel','player_data_code','p1_data');
    }

    public function p2()
    {
        return $this->hasOne('App\Models\PlayerDataModel','player_data_code','p2_data');
    }
}
