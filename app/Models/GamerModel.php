<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GamerModel extends Model
{

    protected $table = "gamers";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "name",
        "average_fps",
        "point",
        "recore_rank",
        "fav_side",
        "total_infantry_killed",
        "total_buildings_captured",
        "total_buildings_killed",
        "total_buildings_lost",
        "total_planes_killed",
        "total_planes_lost",
        "total_units_killed",
        "total_units_lost",
        "total_infantry_lost",
        "total_buildings_bought",
        "total_planes_bought",
        "total_units_bought",
        "total_infantry_bought",
        "total_funds_left",
        "total_disconnected",
        "total_no_completion",
        "total_quit",
        "total_won",
        "total_draw",
        "total_defeated",
        "total_match",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];

    public function getRank()
    {
       return $this->hasOne('App\Models\GamerRankArchivesModel','name','name');
    }
    public function getRozet()
    {
       return $this->hasMany('App\Models\GamerRozetArchivesModel','name','name');
    }
    public function getSide()
    {
    return $this->hasOne('App\Models\SideModel','code','fav_side');
    }
}
