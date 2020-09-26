<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RankModel extends Model
{
    protected $table = "rank";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "name",
        "code",
        "image_url",
        "order",
        "ranked_point",
        "rType",
        "ranked_status",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];
}

