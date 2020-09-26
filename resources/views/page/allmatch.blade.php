<div class="feature-component " style="background-image: url(/images/feature/feature-yr.jpg);">
    <div class="feature-background sub-feature-background">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h1>
                        Yuri's Revenge
                    </h1>
                    <p>Oynanan Oyunlar <strong>1 vs 1</strong></p>
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
    <section class="cncnet-features general-texture game-detail">
        <div class="container">
            <div class="feature">
                <div class="row">
                    <div class="header">
                        <div class="col-md-12">
                            <h3><strong>1  vs  1</strong> Oyunlar</h3>
                        </div>
                    </div>
                </div>
            </div>

        <?php $i=0; ?>
        @foreach ($allmatch as $match)
            @if(($i%4)===0)
            <div class="row recent-game">
            @endif
                @if($match->reconnection_error == 0 and $match->duration > 15 and $match->finished == 1)
                <div class="col-md-3">
                    <div class="game-box">
                        <div class="preview" style="background-image:url(images/maps/yr/{{$match->getMap->image_url}})">
                            <a href="/oyun/{{$match->id}}"
                            class= "status @if($match->p2->won == 1) status-won @else status-lost @endif"></a>
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
                                    {{$match->p2->name}} <span class="points"> @if($match->p2->won == 1) +{{$match->p2->point}} @endif
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
                        <div class="preview" style="background-image:url(images/maps/yr/{{$match->getMap->image_url}})">
                            <a href="/oyun/{{$match->id}}"
                            class= "status @if($match->finished == 0) status-dc @else status @endif @if($match->duration < 15) status-dc @else status @endif "></a>
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
        @endforeach

            <div class="row">
                <div class="col-md-12 text-center">
                    {{ $allmatch->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
