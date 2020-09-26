<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Model;

class UnitsLostModel extends Model
{
    protected $table = "units_lost";
    public $primaryKey = "data_id";
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
        "data_id"
    ];
}
