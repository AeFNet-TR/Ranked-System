<?php

use Illuminate\Support\Facades\Route;
use App\Models\GamerModel;
use App\Models\GamerRozetArchivesModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Tum oyunları listeler. [Last data + pagination]

Route::get('/tumoyunlar','PageController@allmatch');
// Bir oyuna ait veriler.
Route::get('/oyun/{gameid}','PageController@game');
// Bir oyuncuya ait veriler.
Route::get('/profil/{gamernick}','PageController@profile');

// Anasayfa.
Route::get('/','PageController@index');

// Dosyaları al işle db'ye yaz.
Route::get('/autoload','PageController@jsontransfer');

// Dosyaları al işle db'ye yaz.
Route::get('/sistem',function(){
	return view('app')->with('page','about');
});

// Test Sistemi.
Route::get('/test',function(){
	
	$gamers = GamerModel::select('*')->orderBydesc('point')->get();

	foreach ($gamers as $key => $gamer) {
		$rozets = GamerRozetArchivesModel::select('*')->where('name',$gamer->name)->first();
		$rozets = GamerRozetArchivesModel::select('*')->where('name',$gamer->name)->first();
				if($key==0)
				{
					$gamer->name;
					$newRozet = new GamerRozetArchivesModel();
					
					if(!$rozets)
					{
						$newRozet->name = $gamer->name;
						$newRozet->rozet_name = "eniyi";
						$newRozet->save();
					}
					else
					{
						$rozets->rozet_name = "eniyi";
						$rozets->save();
					}
					#LogStart
						\App\Http\Controllers\LogSystem::add($gamer->name." yeni rozeti :"."En iyi oyuncu");
					#LogEnd
					continue;
				}
				elseif($key>0 && $key<=4)
				{
					$newRozet = new GamerRozetArchivesModel();
					if(!$rozets)
					{
						$newRozet->name = $gamer->name;
						$newRozet->rozet_name = "eniyi5";
						$newRozet->save();
					}
					else
					{
						$rozets->rozet_name = "eniyi5";
						$rozets->save();
					}
					#LogStart
						\App\Http\Controllers\LogSystem::add($gamer->name." yeni rozeti :"."En 5 oyuncu");
					#LogEnd
					continue;
				}
				elseif($key>4 && $key<=9)
				{
					$newRozet = new GamerRozetArchivesModel();
					if(!$rozets)
					{
						$newRozet->name = $gamer->name;
						$newRozet->rozet_name = "eniyi10";
						$newRozet->save();
					}
					else
					{
						$rozets->rozet_name = "eniyi10";
						$rozets->save();
					}
					#LogStart
						\App\Http\Controllers\LogSystem::add($gamer->name." yeni rozeti :"."En 10 oyuncu");
					#LogEnd
					continue;
				}
	}
});

Route::get('/elliartisekiz/{matchid}/ellisekiz',function($matchid){

	echo $matchid;
	
});