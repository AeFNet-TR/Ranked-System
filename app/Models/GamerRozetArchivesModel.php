<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GamerRozetArchivesModel extends Model
{
    protected $table = "gamers_rozet_archives";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "name",
        "rozet_name",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];

    public function getImage()
    {
       return $this->hasOne('App\Models\RankModel','code','rozet_name');
    }
}
