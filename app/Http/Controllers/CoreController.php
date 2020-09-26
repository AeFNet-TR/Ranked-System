<?php

namespace App\Http\Controllers;

use App\Models\GamerModel;
use App\Models\MapsModel;
use App\Models\MatchModel;
use App\Models\Player\BuildingsBoughtModel;
use App\Models\Player\BuildingsCapturedModel;
use App\Models\Player\BuildingsKilledModel;
use App\Models\Player\BuildingsLostModel;
use App\Models\Player\InfantryBoughtModel;
use App\Models\Player\InfantryKilledModel;
use App\Models\Player\InfantryLostModel;
use App\Models\Player\PlanesBoughtModel;
use App\Models\Player\PlanesKilledModel;
use App\Models\Player\PlanesLostModel;
use App\Models\Player\UnitsBoughtModel;
use App\Models\Player\UnitsKilledModel;
use App\Models\Player\UnitsLostModel;
use App\Models\PlayerDataModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class CoreController extends Controller
{

    /*                                          Y A P I L A C A K L A R                                       */
    /*                                                                                                        */

    # 5 dk içinde aynı oyuncular aralarıdan aynı map'ta oynadıysa 2.yi sayma.
    public function matchControl($map,$p1Name,$p2Name,$epoch_time)
    {

        $match = new MatchModel();

        $result = $match->select('*')->where('map',$map)->where('p1_data','like',"%".$p1Name."%")->where('p2_data','like',"%".$p2Name."%")->where('epoch_time',">=",$epoch_time-60)->count(); //

        if($result){
            return false;
        }
        else{
            return true;
        }
    }
    #Haritayı kontrol et.
    public function mapControl($map)
    {
        $maps = new MapsModel();

        $result = $maps->select('*')->where('name',$map)->where('ranked_status','active')->count();

        if($result>0){
            return true;
        }
        else
        {
            return false;
        }
    }

    #Dosyayı sil ve taşı.
    public function deleteMove($file,$folder)
    {
        try{
        #LogStart
            \App\Http\Controllers\LogSystem::add("$file Json dosyası silindi.");
        #LogEnd

        Storage::move($file,$folder.basename($file));
        }catch(\Exception $error) {
        #LogStart
            \App\Http\Controllers\LogSystem::add("$file Json dosyası hatalı olarak silindi.");
        #LogEnd
            Storage::delete($folder.basename($file));
            return;
        }
        return;
    }
    # json datalarını kontrol edeceğiz.
    public function start()
    {

        $files = Storage::files('/public/exstats/data');

        date_default_timezone_set("Europe/Istanbul");

        foreach ($files as $key => $fileurl) {

            $match = new MatchModel();
            $value = (json_decode(storage::get($fileurl)));

            if(!$this->mapControl($value->gameReport->map))
            {
            #LogStart
                \App\Http\Controllers\LogSystem::add("[".$value->gameReport->map."] Harita havuzda olmadığı için json datası silindi.");
            #LogEnd
                $this->deleteMove($fileurl,"/public/exstats/data/recycle/");
                continue;
            }
            $p1 = Arr::first($value->playerStats);
            $p2 = Arr::last($value->playerStats);

            if($this->matchControl($value->gameReport->map,$p1->name,$p2->name,$value->gameReport->epoch_time))
            {
                $match->fps = $value->gameReport->fps;
                $match->local_time = $value->gameReport->local_time;
                $match->epoch_time = $value->gameReport->epoch_time;
                $match->players_in_game = $value->gameReport->players_in_game;
                $match->map = $value->gameReport->map;
                $match->starting_units = $value->gameReport->starting_units;
                $match->ai_players = $value->gameReport->ai_players;
                $match->crates = $value->gameReport->crates;
                $match->build_off_ally_conyards = $value->gameReport->build_off_ally_conyards;
                $match->mcv_redeploy = $value->gameReport->mcv_redeploy;
                $match->superweapons = $value->gameReport->superweapons;
                $match->short_game = $value->gameReport->short_game;
                $match->starting_credits = $value->gameReport->starting_credits;
                $match->duration = $value->gameReport->duration;
                $match->finished = $value->gameReport->finished;
                $match->reconnection_error = $value->gameReport->reconnection_error;
        
                $match->p1_data = $value->gameReport->epoch_time."_".$p1->name;
                $match->p2_data = $value->gameReport->epoch_time."_".$p2->name;
                $match->p1_oyuncu = $p1->name;
                $match->p2_oyuncu = $p2->name;

                if($value->gameResult == "COMPLETION_DISCONNECTED"){
                    
                    $match->finished = 0;
                    $match->fps = 0;
                    
                    echo "Oyunda bağlantı kesilmis. <hr>";
                    
                #LogStart
                    \App\Http\Controllers\LogSystem::add("[".$p1->name."] vs [".$p2->name."] Bağlantı kesildiği için maç silindi.");
                #LogEnd
                    
                    $this->deleteMove($fileurl,"/public/exstats/data/recycle/");

                    $match->save();

                    continue;
                }
                if($match->duration <= 15){
                    
                    $match->fps = 0;
                    
                    echo "Oyunda bağlantı kesilmis. <hr>";
                    
                #LogStart
                    \App\Http\Controllers\LogSystem::add("[".$p1->name."] vs [".$p2->name."] Bağlantı kesildiği için maç silindi.");
                #LogEnd
                    
                    $this->deleteMove($fileurl,"/public/exstats/data/recycle/");

                    $match->save();

                    continue;
                    
                }
                if( $match->reconnection_error == 1 )
                {
                    $match->reconnection_error = 1;
                    $match->fps = 0;

                    echo "Oyunda bağlantı hatası var. <hr>";
                    
                #LogStart
                    \App\Http\Controllers\LogSystem::add("[".$p1->name."] vs [".$p2->name."] Bağlantı hatası olduğu için maç silindi.");
                #LogEnd

                    $this->deleteMove($fileurl,"/public/exstats/data/recycle/");

                    $match->save();

                    continue;
                }
                if($match->save())
                {
                    echo "Oyun sisteme işlendi. <hr>";

                #LogStart
                    \App\Http\Controllers\LogSystem::add("[".$p1->name."] vs [".$p2->name."] kaydedildi.");
                #LogEnd
                /* New Point System */
                
                    $gamer = new GamerModel(); // 1 oyuncuya aıt tum verı ıcı
                    $player1 = $gamer::select('*')->where('name',$p1->name)->first();
                    $player2 = $gamer::select('*')->where('name',$p2->name)->first();
                    $win=[];
                    $KFACTOR = 64;
                    if($p1->won){
                        $win['p1']=1;
                        $win['p2']=0;
                    }
                    else
                    {
                        $win['p2']=1;
                        $win['p1']=0;
                    }
                    if(empty($player1->point)){
                        
                        $p1point=0;
                    }
                    else{
                        $p1point = $player1->point;
                    }
                    if(empty($player2->point)){
                        $p2point=0;
                    }
                    else{
                        $p2point = $player2->point;
                    }
                    if($p1point < 50 and $win['p1'] == 1 and $p2point > 300){
                        $KFACTOR = 88;
                    }
                    if($p2point < 50 and $win['p2'] == 1 and $p1point > 300){
                        $KFACTOR = 88;
                    }
                   
                    if($p1point > 300 and $win['p1'] == 1 and $p2point < 100){
                        $KFACTOR = 40;
                    }
                    if($p2point > 300 and $win['p2'] == 1 and $p1point < 100){
                        $KFACTOR = 40;
                    }
                    
                    $newpointa = $p1point + ( $KFACTOR * ($win['p1'] - (1 / (1 + (pow(10, ($p2point - $p1point) / 400))))));
                    $newpointb = $p2point + ( $KFACTOR * ($win['p2'] - (1 / (1 + (pow(10, ($p1point - $p2point) / 400))))));

                    $matchpointa = $newpointa - $p1point;
                    $matchpointb = $newpointb - $p2point;
                    
                    if($p1point < 100 and $win['p1'] == 0 and $p2point > 200)
                    {
                        $matchpointa = 0;
                        $newpointa = $p1point;
                    }
                    if($p2point < 100 and $win['p2'] == 0 and $p1point > 200)
                    {
                        $matchpointb = 0;
                        $newpointb = $p2point;
                    }
                    
                    

                $this->player($p1,$value->gameReport->epoch_time."_".$p1->name,$match->fps,$match->duration,$matchpointa,$newpointa); // puanlar sonranda yollanacak.
                $this->player($p2,$value->gameReport->epoch_time."_".$p2->name,$match->fps,$match->duration,$matchpointb,$newpointb);
                /* New Point System */

                #LogStart
                    \App\Http\Controllers\LogSystem::add("[".$fileurl."] kaydedildiği için arşivlendi.");
                #LogEnd

                $this->deleteMove($fileurl,"/public/exstats/data/saving/");
                continue;
                }
                else
                {
                #LogStart
                    \App\Http\Controllers\LogSystem::add("[".$fileurl."] kayıt esnasında bir hata meydana geldi.");
                #LogEnd
                    echo "Oyun sisteme kaydedilirken bir hata meydana geldi. <hr>"; 
                }
            }
            else
            {
                echo "Oyun zaten kayıtlı. <hr>";
                $this->deleteMove($fileurl,"/public/exstats/data/recycle/");
                continue;
            }
        }
    }
    public function side($sidecode)
    {
        if ($sidecode == null) return "";

        switch($sidecode)
        {
            case "America":
                return "um";
            case "Korea":
                return "kr";
            case "France":
                return "fr";
            case "Germany":
                return "de";
            case "Great Britain":
                return "gb";
            case "Libya":
                return "ly";
            case "Iraq":
                return "iq";
            case "Cuba":
                return "cu";
            case "Russia":
                return "ru";
            case "Yuri":
                return "yuri";
        }
        return "random";
    }
    public function color($colorcode)
    {
        if ($colorcode == null) return "";

        switch($colorcode)
        {
            case 3:
                return "yellow";
            case 13:
                return "orange";
            case 11:
                return "red";
            case 15:
                return "pink";
            case 17:
                return "purple";
            case 21:
                return "blue";
            case 25:
                return "teal";
            case 29:
                return "green";
        }

        return "random";
    }
    # Bir oyuncuya ait verileri içler ve gerekli tablolara kaydettirir.
    public function player($playerdata,$playercode,$fps,$duration,$matchpoint,$newallpoint)
    {
        $player = new PlayerDataModel(); // 1 maca ait veri için.
        $gamer = new GamerModel(); // 1 oyuncuya aıt tum verı ıcın.
        $player->player_data_code = $playercode;
        $player->name = $playerdata->name;
        $player->color = $this->color($playerdata->raw->COL);
        $player->side = $this->side($playerdata->side);

        $oldData = $gamer::select('*')->where('name',$player->name)->first();

        if(empty($oldData))
        {
            // $gamerRank-> verisi guncellencek ve ya eklenecek. Puana göre.
            // Mevcur Rank listesi; burdaki veriye göre gamer rank duzenlenecek
            $gamer->name = $player->name;
            $gamer->save();
            $oldData = $gamer::select('*')->where('name',$player->name)->first();
        }
        // Geçici olarak fav_side son secilen ülke olsun.
        $oldData->fav_side = $player->side;

        $oldData->total_match +=1;
        
        $rozet = new RozetSystem();
        $rozet->rozetControl($player->name,$oldData->total_match);

        $oldData->average_fps = ($oldData->average_fps+$fps)/2;

        if(isset($playerdata->buildings_captured)){
            $player->buildings_captured = $playerdata->buildings_captured;
            $this->insertData($object = new BuildingsCapturedModel(),$player->player_data_code,$playerdata->detailed_counts->buildings_captured);
            $oldData->total_buildings_captured += $player->buildings_captured;
        }
        else{
            $this->insertData($object = new BuildingsCapturedModel(),$player->player_data_code);
        }

        if(isset($playerdata->buildings_killed))
        {
            $player->buildings_killed = $playerdata->buildings_killed;
            $this->insertData($object = new BuildingsKilledModel(),$player->player_data_code,$playerdata->detailed_counts->buildings_killed);
            $oldData->total_buildings_killed += $player->buildings_killed;
        }
        else{
            $this->insertData($object = new BuildingsKilledModel(),$player->player_data_code);
        }

        if(isset($playerdata->planes_killed))
        {
            $player->planes_killed = $playerdata->planes_killed;
            $this->insertData($object = new PlanesKilledModel(),$player->player_data_code,$playerdata->detailed_counts->planes_killed);
            $oldData->total_planes_killed += $player->planes_killed;
        }
        else{
            $this->insertData($object = new PlanesKilledModel(),$player->player_data_code);
        }

        if(isset($playerdata->planes_bought))
        {
            $player->planes_bought = $playerdata->planes_bought;
            $this->insertData($object = new PlanesBoughtModel(),$player->player_data_code,$playerdata->detailed_counts->planes_bought);
            $oldData->total_planes_bought += $player->planes_bought;
        }
        else{
            $this->insertData($object = new PlanesBoughtModel(),$player->player_data_code);
        }

        if(isset($playerdata->planes_lost))
        {
            $player->planes_lost = $playerdata->planes_lost;
            $this->insertData($object = new PlanesLostModel(),$player->player_data_code,$playerdata->detailed_counts->planes_lost);
            $oldData->total_planes_lost += $player->planes_lost;
        }
        else{
            $this->insertData($object = new PlanesLostModel(),$player->player_data_code);
        }

        if(isset($playerdata->units_killed))
        {
            $player->units_killed = $playerdata->units_killed;
            $this->insertData($object = new UnitsKilledModel(),$player->player_data_code,$playerdata->detailed_counts->units_killed);
            $oldData->total_units_killed += $player->units_killed;
        }
        else{
            $this->insertData($object = new UnitsKilledModel(),$player->player_data_code);
        }

        if(isset($playerdata->infantry_killed))
        {
            $player->infantry_killed = $playerdata->infantry_killed;
            $this->insertData($object = new InfantryKilledModel(),$player->player_data_code,$playerdata->detailed_counts->infantry_killed);
            $oldData->total_infantry_killed  += $player->infantry_killed;
        }
        else{
            $this->insertData($object = new InfantryKilledModel(),$player->player_data_code);
        }

        if(isset($playerdata->buildings_lost))
        {
            $player->buildings_lost = $playerdata->buildings_lost;
            $this->insertData($object = new BuildingsLostModel(),$player->player_data_code,$playerdata->detailed_counts->buildings_lost);
            $oldData->total_buildings_lost += $player->buildings_lost;
        }
        else{
            $this->insertData($object = new BuildingsLostModel(),$player->player_data_code);
        }

        if(isset($playerdata->units_lost))
        {
            $player->units_lost = $playerdata->units_lost;
            $this->insertData($object = new UnitsLostModel(),$player->player_data_code,$playerdata->detailed_counts->units_lost);
            $oldData->total_units_lost += $player->units_lost;
        }
        else{
            $this->insertData($object = new UnitsLostModel(),$player->player_data_code);
        }

        if(isset($playerdata->infantry_lost))
        {
            $player->infantry_lost = $playerdata->infantry_lost;
            $this->insertData($object = new InfantryLostModel(),$player->player_data_code,$playerdata->detailed_counts->infantry_lost);
            $oldData->total_infantry_lost += $player->infantry_lost;
        }
        else{
            $player->player_data_code;
            $this->insertData($object = new InfantryLostModel(),$player->player_data_code);
        }

        if(isset($playerdata->buildings_bought))
        {
            $player->buildings_bought = $playerdata->buildings_bought;
            $this->insertData($object = new BuildingsBoughtModel(),$player->player_data_code,$playerdata->detailed_counts->buildings_bought);
            $oldData->total_buildings_bought += $player->buildings_bought;
        }
        else{
            $this->insertData($object = new BuildingsBoughtModel(),$player->player_data_code);
        }

        if(isset($playerdata->units_bought))
        {
            $player->units_bought = $playerdata->units_bought;
            $this->insertData($object = new UnitsBoughtModel(),$player->player_data_code,$playerdata->detailed_counts->units_bought);
            $oldData->total_units_bought += $player->units_bought;
        }
        else{
            $this->insertData($object = new UnitsBoughtModel(),$player->player_data_code);
        }

        if(isset($playerdata->infantry_bought))
        {
            $player->infantry_bought = $playerdata->infantry_bought;
            $this->insertData($object = new InfantryBoughtModel(),$player->player_data_code,$playerdata->detailed_counts->infantry_bought);
            $oldData->total_infantry_bought += $player->infantry_bought;
        }
        else{
            $this->insertData($object = new InfantryBoughtModel(),$player->player_data_code);
        }

        if(isset($playerdata->funds_left))
        {
            $player->funds_left = $playerdata->funds_left;
            $oldData->total_funds_left += $player->funds_left;
        }

        if(isset($playerdata->disconnected)){
            $player->disconnected = $playerdata->disconnected;
            $oldData->total_disconnected +=$playerdata->disconnected;
        }

        if(isset($playerdata->no_completion)){
            $player->no_completion = $playerdata->no_completion;
            $oldData->total_no_completion +=$playerdata->no_completion;
        }

        if(isset($playerdata->quit)){
            $player->quit = $playerdata->quit;
            $oldData->total_quit +=$playerdata->quit;
        }

        if(isset($playerdata->won)){

            $player->won = $playerdata->won;
            $oldData->total_won +=$playerdata->won;

            $rankSystem = new RankSystem();

            $rankSystem->rankControl($player->name,$oldData->total_won);

        }
        if(isset($playerdata->draw)){
            $player->draw = $playerdata->draw;
            $oldData->total_draw +=$playerdata->draw;
        }

        if(isset($playerdata->defeated)){
            $player->defeated = $playerdata->defeated;
            $oldData->total_defeated +=$playerdata->defeated;
        }

        #Point_start
            /* $PointSystem = new PointSystem(); */
            $player->point = $matchpoint;//$PointSystem->set($player,$playerdata->quit,$playerdata->won,$playerdata->defeated,$duration);
            $oldData->point = $newallpoint;
        #Point_and
        
        $rozet = new RozetSystem();
        $rozet->rozetControl($player->name,$oldData->total_match);

        if($player->save() and $oldData->save())
        {
            #LogStart
                \App\Http\Controllers\LogSystem::add("Veritabanına yazma işlemi başarıyla tamamlandı.");
            #LogEnd
            return "true";
        }
        else
        {
            #LogStart
                \App\Http\Controllers\LogSystem::add("Veritabanına yazma işlemi başarısız.");
            #LogEnd
            return;
        }

    }

    # maça ait verileri ayrı ayrı yükler.
    public function insertData($object=null,$playerid,$data=null)
    {
        $unselected = ['ORCA','SLAV','HORNET'];

        if(isset($data))
        {
            foreach($data as $buildkey=> $builddata)
            {
                if (!in_array($buildkey,$unselected))
                {
                    $datas[$buildkey] = $builddata;
                }
            }
        }
        else
        {
            $datas = [];
        }
        if(empty($datas))
        {
            $datas = [];
        }
        $object->data_id = $playerid;
        $object->code=json_encode($datas);

        if($object->save())
            return;
    }
}
