    <div class="feature-component " style="background-image: url(/images/feature/feature-yr.jpg);">
        <div class="feature-background sub-feature-background">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>
                            Yuri's Revenge
                        </h1>
                        <p>Profil <strong>1 vs 1</strong></p>
                        <p>
                            <a href="/" class="previous-link">
                                <i class="fa fa-caret-left" aria-hidden="true"></i>
                                <i class="fa fa-caret-left" aria-hidden="true"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-component">
        <div class="player">
            <div class="feature-background player-card no-card">
                <div class="container">

                    <div class="player-header">
                        <div class="player-stats">

                            <h1 class="username">
                                {{$player->name}}
                            </h1>
                            <ul class="list-inline text-uppercase">
                                <li>
                                    Puan <strong> {{$player->point}} </strong>
                                    <i class="fa fa-bolt fa-fw fa-lg"></i>
                                </li>
                                <li>
                                    Galibiyet <strong>{{$player->total_won}}</strong>
                                    <i class="fa fa-level-up fa-fw fa-lg"></i>
                                </li>
                            </ul>
                        </div>

                        <div class="player-alerts"></div>

                        <div class="player-badges">
                            <h1 class="rank text-center">
                                <span class="text-uppercase">Rank</span>
                                #{{$rank}}
                            </h1>
                            <div class="player-badge badge-2x">
                                <img src="/images/badges/{{$player->getRank->getImage->image_url}}">
                                <p class="lead text-center">{{$player->getRank->getImage->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-footer-background">
                <div class="container">
                    <div class="player-footer">
                        <div class="player-dials">
                            <ul class="list-inline">
                                <li>
                                    <div class="c100 p{{round((($player->total_match*100) - ($player->total_defeated*100)) / $player->total_match)}} center big green">
                                        <p class="title">Kazanma Oranı</p>
                                        <p class="value">{{round(( ($player->total_match*100) - ($player->total_defeated*100)) / $player->total_match) }}%</p>
                                        <div class="slice">
                                            <div class="bar"></div>
                                            <div class="fill"></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="c100 p100 center big purple">
                                        <p class="title">Oyunlar</p>
                                        <p class="value"> {{$player->total_match}} <i class="fa fa-diamond fa-fw"></i></p>
                                        <div class="slice"><div class="bar"></div><div class="fill"></div></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="c100 p93 center big blue">
                                        <p class="title">Ortalama FPS</p>
                                        <p class="value">{{$player->average_fps}} <i class="fa fa-industry fa-fw"></i></p>
                                        <div class="slice"><div class="bar"></div><div class="fill"></div></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="player-achievements">
                            <h3 style="font-weight: bold; text-transform:uppercase; font-size: 22px;" class="title">Rozetler</h3>
                            <div class="achievements-list">
                                @if($player->total_match >= 25 && $player->total_match < 50)
                                <div class="achievement">
                                    <img src="/images/badges/achievement-games.png" style="height:50px"/>
                                    <h5 style="font-weight: bold; text-transform:uppercase; font-size: 12px;">+25 Oyun<br/>Oynadı</h5>
                                </div>
                                @endif
                                @if($player->total_match >= 50 && $player->total_match < 75)
                                <div class="achievement">
                                    <img src="/images/badges/achievement-games.png" style="height:50px"/>
                                    <h5 style="font-weight: bold; text-transform:uppercase; font-size: 12px;">+50 Oyun<br/>Oynadı</h5>
                                </div>
                                @endif
                                @if($player->total_match >= 75 && $player->total_match < 100)
                                <div class="achievement">
                                    <img src="/images/badges/achievement-games.png" style="height:50px"/>
                                    <h5 style="font-weight: bold; text-transform:uppercase; font-size: 12px;">+75 Oyun<br/>Oynadı</h5>
                                </div>
                                @endif
                                @if($player->total_match >= 100)
                                <div class="achievement">
                                    <img src="/images/badges/achievement-games.png" style="height:50px"/>
                                    <h5 style="font-weight: bold; text-transform:uppercase; font-size: 12px;">+100 Oyun<br/>Oynadı</h5>
                                </div>
                                @endif
                                @forelse($player->getRozet as $rozet)
                                    <div class="achievement">
                                        <img src="/images/badges/{{$rozet->getImage->image_url}}" style="height:51px">
                                        <h5 style="font-weight: bold; text-transform:uppercase; font-size: 12px;" class="gold">{{$rozet->getImage->name}}</h5>
                                    </div>
                                @empty
                                <div class="achievement">
                                    <h5 class="gold">Yok</h5>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="player">
            <section class="dark-texture">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Son Oyunlar</h3>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{ $matchs->links() }}
                                </div>
                            </div>
                            <?php $i=0; ?>
                            @forelse ($matchs as $match)
                                @if(($i%4)===0)
                                <div class="row recent-game">
                                @endif
                                    @if($match->reconnection_error == 0 and $match->duration > 15 and $match->finished == 1)
                                    <div class="col-md-3">
                                        <div class="game-box">
                                            <div class="preview" style="background-image:url(/images/maps/yr/{{$match->getMap->image_url}})">
                                                <a href="/oyun/{{$match->id}}" 
                                                class="status @if( $player->name === $match->p1->name and $match->p1->won == 1) status-won @elseif( $player->name === $match->p2->name and $match->p2->won == 1) status-won @else status-lost @endif" ></a>
                                            </div>
                                            <a href="/oyun/{{$match->id}}" class="game-box-link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Oyunu Görüntüle">
                                                <div class="details text-center">
                                                <h4 class="title">{{$match->map}}</h4>
                                                    <small class="status text-capitalize"> {{\Carbon\Carbon::createFromTimeStamp($match->epoch_time)->diffForHumans()}}</small>
                                                    <div><small class="status text-capitalize"><strong>Süre:</strong> {{\Carbon\CarbonInterval::minutes($match->duration/60)}}</small></div>
                                                    <div><small class="status text-capitalize"><strong>Ortalama FPS:</strong> {{$match->fps}}</small></div>
                                                </div>
                                                <div class="footer text-center yr">
                                                    <div class="recent-games-faction hidden-xs faction faction-{{Illuminate\Support\Str::lower($match->p1->getSide->name)}} faction-left "></div>
                                                    <div class="recent-games-faction hidden-xs faction faction-{{Illuminate\Support\Str::lower($match->p2->getSide->name)}} faction-right "></div>

                                                    <h5 class="player @if($match->p1->won == 1) win @else lost @endif">
                                                        {{$match->p1->name}} <span class="points"> @if($match->p1->won == 1) +{{$match->p1->point}} @endif
                                                        @if($match->p1->won == 0 and $match->p1->point < 0) {{$match->p1->point}} @endif
                                                        @if($match->p1->won == 0 and $match->p1->point == 0) +{{$match->p1->point}} @endif</span>
                                                    </h5>
                                                    <p class="vs">vs</p>
                                                    <h5 class="player @if($match->p2->won == 1) win @else lost @endif">
                                                        {{$match->p2->name}} <span class="points">  @if($match->p2->won == 1) +{{$match->p2->point}} @endif
                                                        @if($match->p2->won == 0 and $match->p2->point < 0) {{$match->p2->point}} @endif
                                                        @if($match->p2->won == 0 and $match->p2->point == 0) +{{$match->p2->point}} @endif</span>
                                                    </h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-md-3">
                                        <div class="game-box">
                                            <div class="preview" style="background-image:url(/images/maps/yr/{{$match->getMap->image_url}})">
                                                <a href="/oyun/{{$match->id}}" class= "status @if($match->finished == 0) status-dc @else status @endif @if($match->duration < 15) status-dc @else status @endif "></a>
                                            </div>
                                            <a href="/oyun/{{$match->id}}" class="game-box-link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Oyunu Görüntüle">
                                                <div class="details text-center">
                                                <h4 class="title">{{$match->map}}</h4>
                                                    <small class="status text-capitalize"> {{\Carbon\Carbon::createFromTimeStamp($match->epoch_time)->diffForHumans()}}</small>
                                                    <div><small class="status text-capitalize"><strong>Süre:</strong> {{\Carbon\CarbonInterval::minutes($match->duration/60)}}</small></div>
                                                    <div><small class="status text-capitalize"><strong>Ortalama FPS:</strong> {{$match->fps}}</small></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    @if($i>=3)
                                </div>
                                    @endif
                            <?php $i++; if($i>=4) $i=0; ?>
                            @empty
                            Mac verisi bulunamadi.
                            @endforelse
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{ $matchs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
