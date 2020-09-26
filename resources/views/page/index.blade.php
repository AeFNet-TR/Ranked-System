    <div class="feature-component " style="background-image: url(images/feature/feature-yr.jpg);">
        <div class="feature-background sub-feature-background">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h1>
                            Yuri's Revenge
                        </h1>
                        <p>
                            AeFNet Ranked <strong>1 vs 1</strong>
                        </p>
                        <!--<p>
                            <a href="/" class="previous-link">
                                <i class="fa fa-caret-left" aria-hidden="true"></i>
                                <i class="fa fa-caret-left" aria-hidden="true"></i>
                            </a>
                        </p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-component">
        <section class="cncnet-features general-texture game-detail">
            <div class="container">
                <div class="feature">
                    <div class="row">
                        <div class="header">
                            <div class="col-md-12">
                                <h3><strong>Sistem Hakkında</strong> Bilgiler</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="qm-stats">
                                <div class="stat green">
                                    <div class="text-center">
                                        <i class="fa fa-diamond fa-fw"></i>
                                        <h4>Oyunlar</h4>
                                    </div>
                                    <div class="text-center">
                                        <div class="value">{{$lastgamecount}} </div>
                                        <div><small>(Son 24 saatte)</small></div>
                                    </div>
                                </div>

                                <div class="stat purple">
                                    <div class="text-center">
                                        <i class="fa fa-level-up fa-fw fa-lg"></i>
                                        <h4>Yeni Oyuncular</h4>
                                    </div>
                                    <div class="text-center">
                                        <div class="value">{{$lasthoursgamecount}}</div>
                                        <div><small>(Bugün)</small></div>
                                    </div>
                                </div>

                                <div class="stat blue">
                                    <div class="text-center">
                                        <i class="fa fa-industry fa-fw"></i>
                                        <h4>Yeni Oyunlar</h4>
                                    </div>
                                    <div class="text-center">
                                        <div class="value">{{$lastqueued}}</div>
                                        <div><small>(Son 1 saatte)</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <h2><strong>08/2020</strong> Lig Şampiyonu!</h2>
        <div class="feature">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="ladder-cover cover-yr" style="background-image: url(&#39;/images/ladder/ra-cover-masters.png&#39;)">
                        <div class="details tier-league-cards">
                            <div class="type">
                                <h1 class="lead"><strong>Redkitt[TR]</strong></h1>
                                <h2><strong>Rank #1</strong></h2>
                                <ul class="list-inline" style="font-size: 14px;">
                                    <li>
                                        Zafer
                                        <i class="fa fa-level-up"></i> 20
                                    </li>
                                    <li>
                                        Oyun
                                        <i class="fa fa-diamond"></i> 20
                                    </li>
                                </ul>
                                <small>08/2020
                                <strong>Lig</strong>  Şampiyonu !</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="ladder-cover cover-yr" style="background-image: url(&#39;/images/ladder/yr-cover-masters.png&#39;)">
                        <div class="details tier-league-cards">
                            <div class="type">
                                <h1 class="lead"><strong>EAydN</strong></h1>
                                <h2><strong>Rank #2</strong></h2>
                                <ul class="list-inline" style="font-size: 14px;">
                                    <li>
                                        Zafer
                                        <i class="fa fa-level-up"></i> 37
                                    </li>
                                    <li>
                                        Oyun
                                        <i class="fa fa-diamond"></i> 46
                                    </li>
                                </ul>
                                <small>08/2020
                                <strong>Lig</strong>  İkincisi !</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
                <div class="feature">
                    <div class="row">
                        <div class="header">
                            <div class="col-md-12">
                                <h3><strong>1 vs 1</strong> Son Oyunlar
                                    <small>
                                        <a href="/tumoyunlar">Tüm Oyunlar</a>
                                    </small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row recent-game">
                    @foreach ($matchs as $match)
                        @if($match->reconnection_error == 0 and $match->duration > 15 and $match->finished == 1)
                        <div class="col-md-3">
                            <div class="game-box">
                                <div class="preview" style="background-image:url(images/maps/yr/{{$match->getMap->image_url}})">
                                    <a href="/oyun/{{$match->id}}" class="status @if($match->p2->won == 1) status-won @else status-lost @endif"></a>
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
                                            @if($match->p1->won == 0 and $match->p1->point == 0) +{{$match->p1->point}} @endif 
                                            @if($match->p1->won == 0 and $match->p1->point < 0) {{$match->p1->point}} @endif</span>
                                        </h5>
                                        <p class="vs">vs</p>
                                        <h5 class="player @if($match->p2->won == 1) win @else lost @endif">
                                            {{$match->p2->name}} <span class="points"> @if($match->p2->won == 1) +{{$match->p2->point}} @endif
                                            @if($match->p2->won == 0 and $match->p2->point == 0) +{{$match->p2->point}} @endif 
                                            @if($match->p2->won == 0 and $match->p2->point < 0) {{$match->p2->point}} @endif</span>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="col-md-3">
                            <div class="game-box">
                                <div class="preview" style="background-image:url(images/maps/yr/{{$match->getMap->image_url}})">
                                    <a href="/oyun/{{$match->id}}" class="status @if($match->finished == 0) status-dc @else status @endif @if($match->duration < 15) status-dc @else status @endif "></a>
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
                        @endforeach
                </div>
                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3><strong>1 vs 1</strong> Sıralama</h3>
                                    </div>
                                    <div class="col-md-8 text-right">
                                        <ul class="list-inline">
                                            <li>
                                                <button class="btn btn-secondary text-uppercase" data-toggle="modal" data-target="#battleRanks" style="font-size: 15px;">
                                                    <i class="fa fa-trophy fa-lg fa-fw" aria-hidden="true" style="margin-right: 5px;"></i> Tüm Rütbeler
                                                </button>
                                            </li>
                                            <!--<li>
                                                <div class="btn-group filter">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle text-uppercase" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 15px;">
                                                        <i class="fa fa-industry fa-fw" aria-hidden="true" style="margin-right: 5px;"></i> Previous Month <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="https://ladder.cncnet.org/ladder/7-2020/yr/" title="Yuri&#39;s Revenge">Rankings - 7-2020</a>
                                                        </li>
                                                        <li>
                                                            <a href="https://ladder.cncnet.org/ladder/6-2020/yr/" title="Yuri&#39;s Revenge">Rankings - 6-2020</a>
                                                        </li>
                                                        <li>
                                                            <a href="https://ladder.cncnet.org/ladder/5-2020/yr/" title="Yuri&#39;s Revenge">Rankings - 5-2020</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <form>
                                                    <div class="form-group" method="GET">
                                                        <div class="search" style="position:relative;">
                                                            <label for="search-input" style="position: absolute;left: 12px;top: 7px;">
                                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                            </label>
                                                            <input class="form-control" name="search" value="" placeholder="Oyuncu Adı..." style="padding-left:40px;">
                                                        </div>
                                                    </div>
                                                </form>
                                            </li>-->
                                        </ul>
                                        <div class="text-right"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{ $players->links() }}
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($players as $key=>$player)
                                <div class="col-md-4">
                                    <a href="/profil/{{$player->name}}" class="player-box-link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Profili Görüntüle">
                                        <div class="player-box player-card {{Illuminate\Support\Str::slug(Str::lower($player->getSide->name),'-')}}">
                                            <div class="details text-left">
                                                <div class="player-badge badge-1x">
                                                    <img src="images/badges/{{$player->getRank->getImage->image_url}}" style="max-width:100%">
                                                </div>
                                                <h1 class="rank">Rank #{{$key+$players->firstItem()}}</h1>
                                                <p class="username">{{$player->name}}</p>
                                                <p class="points">{{$player->point}} Puan</p>
                                                <ul class="list-unstyled extra-stats">
                                                    <li>Zafer <i class="fa fa-level-up fa-fw fa-lg"></i> {{$player->total_won}}</li>
                                                    <li>Oyun <i class="fa fa-diamond fa-fw fa-lg"></i> {{$player->total_match}}</li>
                                                </ul>
                                                <div class="most-used-country country-yr-{{Illuminate\Support\Str::slug(Str::lower($player->getSide->name),'-')}}"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach

                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{ $players->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Battle Ranks -->
        <div class="modal fade" id="battleRanks" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="modal-title">Tüm Rütbeler <small class="text-uppercase">Mevcut rütbeler</small></h3>
                    </div>
                    <div class="modal-body clearfix text-center">
                        @foreach($ranks as $rank)
                        <p class="lead">{{$rank->name}}</p>
                        <div class="player-badge badge-2x" style="margin: 0 auto; height: 150px;">
                            <img src="images/badges/{{$rank->image_url}}" style="height:150px;">
                        </div>
                        <hr>
                        @endforeach
                    </div>
                    <div class="modal-footer" style="border:none;">
                        <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
