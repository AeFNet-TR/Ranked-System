<div class="feature-component " style="background-image: url(/images/feature/feature-yr.jpg);">
    <div class="feature-background sub-feature-background">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h1>
                        Yuri's Revenge
                    </h1>
                    <p><strong>1 vs 1</strong> Oyun İstatistiği </p>
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
    <div class="game yr">
        <section class="game-statistics">
            <div class="game-details">
                <div class="container" style="position:relative;padding: 60px 0;">
                    <!--? $hasWash = false; ?-->
                    <div class="player-vs">
                        @if($match->finished == 0)
                        <h3 class="game-intro">
                            <a href="/profil/{{$match->p1_oyuncu}}" title="{{$match->p1_oyuncu}} &#39;in profili" style="order:0; ">
                                <span class="player">{{$match->p1_oyuncu}} <strong>+0</strong></span>
                            </a>
                            <div class="game-status-icon" style="order:0; ">
                                <i class="fa fa-handshake-o fa-fw" style="color: #e96b1e;"></i>
                            </div>
                        </h3>
                        <div class="vs"> VS </div>
                        <h3 class="game-intro">
                            <a href="/profil/{{$match->p2_oyuncu}}" title="{{$match->p2_oyuncu}} &#39;in profili" style=" order: 1; ">
                                <span class="player">{{$match->p2_oyuncu}} <strong>+0</strong></span>
                            </a>
                            <div class="game-status-icon" style="">
                                <i class="fa fa-handshake-o fa-fw" style="color: #e96b1e;"></i>
                            </div>
                        </h3>
                        @endif
                        
                        @if($match->duration < 15 )
                        <h3 class="game-intro">
                            <a href="/profil/{{$match->p1_oyuncu}}" title="{{$match->p1_oyuncu}} &#39;in profili" style=" order: 0; ">
                                <span class="player">{{$match->p1_oyuncu}} <strong>+0</strong></span>
                            </a>
                            <div class="game-status-icon" style="order:0; ">
                                <i class="fa fa-plug fa-fw" style="color: #E91E63;"></i>
                            </div>
                        </h3>
                        <div class="vs"> VS </div>
                        <h3 class="game-intro">
                            <a href="/profil/{{$match->p2_oyuncu}}" title="{{$match->p2_oyuncu}} &#39;in profili" style=" order: 1; ">
                                <span class="player">{{$match->p2_oyuncu}} <strong>+0</strong></span>
                            </a>
                            <div class="game-status-icon" style="">
                                <i class="fa fa-plug fa-fw" style="color: #E91E63;"></i>
                            </div>
                        </h3>
                        @endif
                        @if($match->reconnection_error == 1)
                        <button type="submit" class="btn btn-md btn-danger" disabled>Bağlantı Hatası</button>
                        @endif
                        @if($match->reconnection_error == 0 and $match->duration > 15 and $match->finished == 1)
                        <div class="hidden-xs faction faction-{{Illuminate\Support\Str::lower($p1->getSide->name)}} faction-left "></div>
                        <h3 class="game-intro">
                            <a href="/profil/{{$p1->name}}" title="{{$p1->name}} &#39;in profili" style="order:0; ">
                                <span class="player">{{$p1->name}} <strong>@if($p1->won == 1) +{{$match->p1->point}} @endif
                                @if($p1->won == 0 and $match->p1->point == 0) +{{$match->p1->point}} @endif
                                @if($p1->won == 0 and $match->p1->point < 0) {{$match->p1->point}} @endif</strong></span>
                            </a>
                            <div class="game-status-icon" style="order:0; ">
                                @if($p1->won==1)<i class="fa fa-trophy fa-fw" style="color: #32e91e;"></i>@else <i class="fa fa-sun-o fa-fw" style="color: #00BCD4;"></i>@endif
                            </div>
                        </h3>
                        <div class="vs"> VS </div>
                        <div class="hidden-xs faction faction-{{Illuminate\Support\Str::lower($p2->getSide->name)}}  faction-right "></div>
                        <h3 class="game-intro">
                            <a href="/profil/{{$p2->name}}" title="{{$p2->name}} &#39;in profili" style=" order: 1; ">
                                <span class="player">{{$p2->name}} <strong> @if($p2->won == 1) +{{$match->p2->point}} @endif
                                @if($p2->won == 0 and $match->p2->point == 0) +{{$match->p2->point}} @endif
                                @if($p2->won == 0 and $match->p2->point < 0) {{$match->p2->point}} @endif</strong></span>
                            </a>
                            <div class="game-status-icon" style="">
                                @if($p2->won==1)<i class="fa fa-trophy fa-fw" style="color: #32e91e;"></i>@else <i class="fa fa-sun-o fa-fw" style="color: #00BCD4;"></i>@endif
                            </div>
                        </h3>
                        @endif
                    </div>
                    <div class="game-details text-center">
                        <div>
                            <strong>Süre:</strong> {{\Carbon\CarbonInterval::minutes($match->duration/60)}}
                        </div>
                        <div>
                        <strong>Ortalama FPS:</strong> {{$match->fps}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dark-texture">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3> {{$match->map}} </h3>
                        <div class="feature-map">
                            <img src="/images/maps/yr/{{$match->getMap->image_url}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>Oyun Ayarları</h3>
                        <ul class="list-unstyled game-details-list">
                            <li><strong>Kısa Oyun : </strong> @if($match->short_game == 1) Açık @else Kapalı @endif</li>
                            <li><strong>Oyuncu Sayısı : </strong>{{$match->players_in_game}}</li>
                            <li><strong>Süper Silahlar : </strong> @if($match->superweapons == 1) Açık @else Kapalı @endif</li>
                            <li><strong>Sandıklar : </strong> @if($match->crates == 1) Açık @else Kapalı @endif</li>
                            <li><strong>MCV Hareket : </strong> @if($match->mcv_redeploy == 1) Açık @else Kapalı @endif</li>
                            <li><strong>Dostuna Yardım : </strong>@if($match->build_off_ally_conyards == 1) Açık @else Kapalı @endif</li>
                            <li><strong>Başlangıç Ünitesi : </strong>{{$match->starting_units}}</li>
                            <li><strong>Başlangıç Parası : </strong>{{$match-> starting_credits}}</li>
                            <li><strong>Bağlantı Kopması : </strong>@if($match->finished == 1) Hayır @else Evet @endif</li>
                            <li><strong>Yeniden Bağlanma Hatası (OOS) : </strong>@if($match->reconnection_error == 1) Evet @else Hayır @endif</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        @if($match->reconnection_error == 0 and $match->duration > 15 and $match->finished == 1)
        <section class="dark-texture">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <a href="/profil/{{$p1->name}}" class="profile-link">
                            <div class="profile-detail">
                                <div class="player-badge badge-1x">
                                    <img src="/images/badges/{{$p1->getRank->getImage->image_url}}" style="max-width:100%">
                                </div>
                                <h3>Sıra  # {{$p1rank}}</h3>
                                <p class="username"><i class="fa fa-user fa-fw"></i> {{$p1->name}}</p>
                                <p class="points"><i class="fa fa-bolt fa-fw"></i> {{$p1->getGamer->point}}</p>
                                <p class="points"><strong>Kalan Para: </strong> {{$p1->funds_left}}</p>
                                <p class="colour player-panel-yellow" style="width:25px;height:25px;"></p>
                                <div class="country">
                                    <span class="flag-icon flag-icon-{{Illuminate\Support\Str::lower($p1->side)}}"></span>
                                </div>
                            </div>
                        </a>
                        <div class="player-colour player-panel-yellow"></div>
                        <div class="player-stats-panel profile-stats-breakdown clearfix">
                            <div></div>
                            <div class="row stats-row">
                                <div class="col-md-12">
                                    <div class="clearfix stats-box">
                                    <h4>Üniteler</h4>
                                        @foreach (json_decode($p1->UnitsBought->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Askerler</h4>
                                        <div class="clearfix stats-box">
                                        @foreach (json_decode($p1->InfantryBought->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="clearfix stats-box">
                                    <h4>Uçaklar</h4>
                                        @foreach (json_decode($p1->PlanesBought->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--<div class="col-md-12">
                                    <h4>Gemiler</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    <h4>Yapılar</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p1->BuildingsBought->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row stats-row">
                                <div class="col-md-12">
                                    <h4>Öldürülen Üniteler</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p1->UnitsKilled->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Öldürülen Askerler</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p1->InfantryKilled->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Öldürülen Uçaklar</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p1->PlanesKilled->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--<div class="col-md-12">
                                    <h4>Ships Killed</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    <h4>Yıkılan Yapılar</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p1->BuildingsKilled->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row stats-row">
                                <div class="col-md-12">
                                    <h4>Ele Geçirilen Yapılar</h4>
                                   <!-- @foreach (json_decode($p1->BuildingsCaptured->code) as $key=> $item)
                                        <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                    @endforeach-->
                                </div>
                            </div>
                    <!--    <div class="row stats-row">
                                <div class="col-md-12">
                                    <h4>Kalan Üniteler</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Kalan Askerler</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                    </div>
                                <div class="col-md-12">
                                    <h4>Kalan Uçaklar</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                    </div>
                                <div class="col-md-12">
                                    <h4>Kalan Yapılar</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Ships Left</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>
                            </div>
                            <div class="row stats-row">
                                <div class="col-md-12">
                                    <h4>Crates Found</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <a href="/profil/{{$p2->name}}" class="profile-link">
                            <div class="profile-detail">
                                <div class="player-badge badge-1x">
                                    <img src="/images/badges/{{$p2->getRank->getImage->image_url}}" style="max-width:100%">
                                </div>
                                <h3>Sıra  #{{$p2rank}}</h3>
                                <p class="username"><i class="fa fa-user fa-fw"></i> {{$p2->name}}</p>
                                <p class="points"><i class="fa fa-bolt fa-fw"></i> {{$p2->getGamer->point}}</p>
                                <p class="points"><strong>Kalan Para: </strong> {{$p2->funds_left}}</p>
                                <p class="colour player-panel-red" style="width:25px;height:25px;"></p>
                                <div class="country">
                                    <span class="flag-icon flag-icon-{{Illuminate\Support\Str::lower($p2->side)}}"></span>
                                </div>
                            </div>
                        </a>
                        <div class="player-colour player-panel-red"></div>
                        <div class="player-stats-panel profile-stats-breakdown clearfix">
                            <div></div>
                            <div class="row stats-row">
                                <div class="col-md-12">
                                    <div class="clearfix stats-box">
                                    <h4>Üniteler</h4>
                                        @foreach (json_decode($p2->UnitsBought->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Askerler</h4>
                                        <div class="clearfix stats-box">
                                        @foreach (json_decode($p2->InfantryBought->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="clearfix stats-box">
                                    <h4>Uçaklar</h4>
                                        @foreach (json_decode($p2->PlanesBought->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--<div class="col-md-12">
                                    <h4>Gemiler</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    <h4>Yapılar</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p2->BuildingsBought->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row stats-row">
                                <div class="col-md-12">
                                    <h4>Öldürülen Üniteler</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p2->UnitsKilled->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Öldürülen Askerler</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p2->InfantryKilled->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Öldürülen Uçaklar</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p2->PlanesKilled->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--<div class="col-md-12">
                                    <h4>Ships Killed</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>-->
                                <div class="col-md-12">
                                    <h4>Yıkılan Yapılar</h4>
                                    <div class="clearfix stats-box">
                                        @foreach (json_decode($p2->BuildingsKilled->code) as $key=> $item)
                                            <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row stats-row">
                                <div class="col-md-12">
                                    <h4>Ele Geçirilen Yapılar</h4>
                                   <!-- @foreach (json_decode($p2->BuildingsCaptured->code) as $key=> $item)
                                        <div class="yr-cameo cameo-tile cameo-{{Illuminate\Support\Str::lower($key)}}icon"><span class="number">{{$item}}</span></div>
                                    @endforeach-->
                                </div>
                            </div>
                    <!--    <div class="row stats-row">
                                <div class="col-md-12">
                                    <h4>Kalan Üniteler</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Kalan Askerler</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                    </div>
                                <div class="col-md-12">
                                    <h4>Kalan Uçaklar</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                    </div>
                                <div class="col-md-12">
                                    <h4>Kalan Yapılar</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4>Ships Left</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>
                            </div>
                            <div class="row stats-row">
                                <div class="col-md-12">
                                    <h4>Crates Found</h4>
                                    <div class="clearfix stats-box">
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </div>
</div>
