<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GamerRankArchivesModel extends Model
{
    protected $table = "gamers_rank_archives";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "name",
        "rank_name",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];

    public function getImage()
    {
       return $this->hasOne('App\Models\RankModel','code','rank_name'); //name
    }

}

