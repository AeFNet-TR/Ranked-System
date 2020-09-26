<?php
include "api.php";

$files = scandir("/home/redalert/ranked/storage/app/public/stats");

$i=0;
foreach ($files as $key => $file) {
    if(!file_exists($file) && strstr($file,".dmp") && $i<=19) // .dmp içeren dosyaları al.
    {
        echo  decode($file);
        $i++;
    }

}

header('Location: https://ranked.redalert02.com/autoload');



/*
function baglanti()
{
    $host = "127.0.0.1";
    $dbname = "tranked";
    $username = "root";
    $pass = "";
    try
    {
        return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$pass);
    }
    catch(PDOException $error) {$error->getmessage();}
}
*/

function decode($statsDmpFilePathSalt,$gameStatsFolder="/home/redalert/ranked/storage/app/public/exstats/",$endStatsFolder="/home/redalert/ranked/storage/app/public/endstats/")
{
    //var_dump(explode("_",explode(".dmp",$statsDmpFilePathSalt)[0]));
    $pattern= '/^\d{10}|\_|[\w|\W]+\.(dmp)$/';

    if(preg_match_all($pattern, $statsDmpFilePathSalt,$data))
    {
        $statsDmpFilePath = "/home/redalert/ranked/storage/app/public/stats/".$statsDmpFilePathSalt;
        $statsDmpFilePath = "/home/redalert/ranked/storage/app/public/stats/".$statsDmpFilePathSalt;
        //$statsPath = explode("storage/stats/",$statsDmpFilePath);
        $thisPlayerName = explode(".dmp",$data[0][2])[0];

        $parser = new YRStatParser();

        // "Running YRStatParser with [thisPlayerName: $thisPlayerName, statsDmpFilePath: $statsDmpFilePath, gameStatsFolder: $gameStatsFolder]\n";
        $rawStats = $parser->processStatsDmp($statsDmpFilePath);
        $gameStats = $parser->getGameStats($rawStats, $thisPlayerName);
        // 2 Oyuncu mu var ? Yapay zeka var mı ? Kontrol eder.

        if(isset($gameStats) && count($gameStats['playerStats'])==2 && $gameStats['gameReport']['ai_players']==0)
        { # Artık yapay zekayı göndermiyor sorgu düzenlenebilir.

            //$epochDate = date('Y-m-d H-i-s', $gameStats['gameReport']['epoch_time']);
            $statsFolder = $gameStatsFolder;

        // Veri database'de var mı kontrol et.
        /*    $db = baglanti();
            $query = $db->prepare("SELECT * FROM `match` WHERE `epoch_time` = ? AND `map` = ? AND `duration` = ?");
            $query->execute(array($gameStats['gameReport']['epoch_time'],$gameStats['gameReport']['map'],$gameStats['gameReport']['duration']));
            $saveControl = $query->fetch();

            if(!$saveControl)
            {*/

                $output_stats_parsed = "$statsFolder/data/{$gameStats['gameReport']['epoch_time']}_".$gameStats['playerStats'][0]['name'].".json";
                $output_stats_raw = "$statsFolder/raw/{$gameStats['gameReport']['epoch_time']}_".$gameStats['playerStats'][0]['name']."raw.json";
                /*
                echo $statsDmpFilePath;
                var_dump($gameStats);
                echo "<hr>";
                */
                // yedeğini al.
                copy($statsDmpFilePath, $endStatsFolder.$statsDmpFilePathSalt);
                unlink($statsDmpFilePath);
                $parser->saveToJsonFile($gameStats, $output_stats_parsed);
                // gamestats json datasını kaydeder.
                $parser->saveToJsonFile($rawStats, $output_stats_raw);
                // gamestats raw json datasını kaydeder.
                // echo ($gameStats);
        /* }
            else
            {   // database'de kayıtlıysa sil
                //unlink($statsDmpFilePath);
                return;
            }*/
            return $statsDmpFilePathSalt." ::::::::::::::::::: Oyuncu sayısı : ".count($gameStats['playerStats'])." ve ya bot sayısı : ".$gameStats['gameReport']['ai_players']."İşlem başarılı <br>";
        }

        else
        {

            /*
            echo $statsDmpFilePath;
            var_dump($gameStats);
            echo "<hr>";
            */
            unlink($statsDmpFilePath);

            return $statsDmpFilePathSalt." ::::::::::::::::::: Oyuncu sayısı : ".count($gameStats['playerStats'])." ve ya bot sayısı : ".$gameStats['gameReport']['ai_players']."<br>";
        }
    }

}

/*
    if (!file_exists($statsFolder)) {
        mkdir($statsFolder, 0755, true);
    }

    $outpout_stats_dmp = "$statsFolder/{$gameStats['gameReport']['epoch_time']}_stats.dmp";
    $output_stats_parsed = "$statsFolder/{$gameStats['gameReport']['epoch_time']}_stats_parsed.json";
    $output_stats_raw = "$statsFolder/{$gameStats['gameReport']['epoch_time']}_stats_raw.json";

    copy($statsDmpFilePath, $outpout_stats_dmp);
    $parser->saveToJsonFile($gameStats, $output_stats_parsed);
    $parser->saveToJsonFile($rawStats, $output_stats_raw);


    echo "stats_dmp: $outpout_stats_dmp <br>";
    echo "stats_parsed: $output_stats_parsed <br>";
    echo "stats_raw: $output_stats_raw <br>";
}
else
{
    echo "<title>Error</title>";
    echo "<center>Stats Api Error!</center><center>v.1.2.0</center>";

    return false;
}*/

?>
