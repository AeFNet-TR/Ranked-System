<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Model;

class InfantryLostModel extends Model
{
    protected $table = "infantry_lost";
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
