<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogSystem extends Controller
{
    static function add($text)
    {
        Storage::disk('local')->append('log.txt', "Tarih: ".date('d.m.Y H:i:s')." İşlem: ".$text);
        return;
    }
}
