<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerDataModel extends Model
{
    protected $table = "player_data";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "player_data_code",
        "name",
        "point",
        "buildings_captured",
        "buildings_killed",
        "planes_killed",
        "units_killed",
        "infantry_killed",
        "buildings_lost",
        "units_lost",
        "infantry_lost",
        "buildings_bought",
        "planes_bought",
        "units_bought",
        "infantry_bought",
        "funds_left",
        "side",
        "disconnected",
        "no_completion",
        "quit",
        "won",
        "draw",
        "defeated",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];

    public function getSide()
    {
        return $this->hasOne('App\Models\SideModel','code','side');
    }

    public function getGamer()
    {
       return $this->hasOne('App\Models\GamerModel','name','name');
    }

    public function getRozet()
    {
       return $this->hasOne('App\Models\GamerRozetArchivesModel','name','name');
    }
    public function getRank()
    {
       return $this->hasOne('App\Models\GamerRankArchivesModel','name','name');
    }


    public function UnitsBought()
    {
       return $this->hasOne('App\Models\Player\UnitsBoughtModel','data_id','player_data_code');
    }

    public function UnitsLost()
    {
       return $this->hasOne('App\Models\Player\UnitsLostModel','data_id','player_data_code');
    }

    public function UnitsKilled()
    {
       return $this->hasOne('App\Models\Player\UnitsKilledModel','data_id','player_data_code');
    }

    public function PlanesLost()
    {
       return $this->hasOne('App\Models\Player\PlanesLostModel','data_id','player_data_code');
    }

    public function PlanesKilled()
    {
       return $this->hasOne('App\Models\Player\PlanesKilledModel','data_id','player_data_code');
    }

    public function PlanesBought()
    {
       return $this->hasOne('App\Models\Player\PlanesBoughtModel','data_id','player_data_code');
    }

    public function InfantryLost()
    {
       return $this->hasOne('App\Models\Player\InfantryLostModel','data_id','player_data_code');
    }

    public function InfantryKilled()
    {
       return $this->hasOne('App\Models\Player\InfantryKilledModel','data_id','player_data_code');
    }

    public function InfantryBought()
    {
       return $this->hasOne('App\Models\Player\InfantryBoughtModel','data_id','player_data_code');
    }

    public function BuildingsLost()
    {
       return $this->hasOne('App\Models\Player\BuildingsLostModel','data_id','player_data_code');
    }

    public function BuildingsKilled()
    {
       return $this->hasOne('App\Models\Player\BuildingsKilledModel','data_id','player_data_code');
    }

    public function BuildingsCaptured()
    {
       return $this->hasOne('App\Models\Player\BuildingsCapturedModel','data_id','player_data_code');
    }

    public function BuildingsBought()
    {
       return $this->hasOne('App\Models\Player\BuildingsBoughtModel','data_id','player_data_code');
    }
}
