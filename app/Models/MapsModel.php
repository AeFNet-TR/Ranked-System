<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapsModel extends Model
{
    protected $table = "maps";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "name",
        "image_url",
        "ranked_status",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];
}
