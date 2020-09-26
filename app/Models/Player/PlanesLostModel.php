<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Model;

class PlanesLostModel extends Model
{
    protected $table = "planes_lost";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "data_id",
        "code",
        "count",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];
}
