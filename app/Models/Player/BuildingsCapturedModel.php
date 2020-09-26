<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Model;

class BuildingsCapturedModel extends Model
{
    protected $table = "buildings_captured";
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
