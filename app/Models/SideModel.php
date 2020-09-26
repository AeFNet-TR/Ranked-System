<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SideModel extends Model
{
    protected $table = "side";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $fillable = [
        "id",
        "code",
        "name",
        "side",
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id"
    ];
}
