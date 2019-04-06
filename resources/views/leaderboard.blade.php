@extends('layouts.app')

@section('content')
<section class="teams1 cid-qIoeaRX6R3" id="teams1-j" data-sortbtn="btn-primary">

    <div class="container" style="padding-top: 45px;">
        <h2 class="mbr-section-title mbr-fonts-style align-left mbr-black display-2">Leaderboard of top rated meme categories</h2>
        @foreach ($memes as $category => $meme)
        <h3 class="mbr-section-subtitle mbr-fonts-style align-left pt-2 display-5">Top 3 memes under #{{ $category }} category based on its ELO score</h3>
        <div class="row justify-content-center flip-card pt-4">
            @foreach ($meme as $memeobj)
            <div class="col-md-6 col-lg-4 card-wrap">
                <div class="image-wrap">
                    <img src="{{ asset('img') . '/' . $memeobj->id . '.' . pathinfo($memeobj->url)['extension'] }}" alt="">
                    <div class="img-overlay"></div>
                    <div class="social-media align-center">
                        <ul>
                            <li>
                                <a class="icon-transition">
                                    <span class="mbr-iconfont mbr-black"><small>{{ $memeobj->upvotes }}</small></span>
                                </a>
                            </li>
                            <li style="padding-right: 30px;">
                                <a class="icon-transition">
                                    <span class="mbr-iconfont mbr-black">&#128077;</span>
                                </a>
                            </li>
                            <li>
                                <a class="icon-transition">
                                    <span class="mbr-iconfont mbr-black"><small>{{ $memeobj->downvotes }}</small></span>
                                </a>
                            </li>
                            <li style="padding-right: 30px;">
                                <a class="icon-transition">
                                    <span class="mbr-iconfont mbr-black">&#128078;</span>
                                </a>
                            </li>
                            <li>
                                <a class="icon-transition">
                                    <span class="mbr-iconfont mbr-black"><small>{{ $memeobj->rating }}</small></span>
                                </a>
                            </li>
                            <li>
                                <a class="icon-transition">
                                    <span class="mbr-iconfont mbr-black">&#127775;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <h5 class="mbr-fonts-style mbr-role align-left pt-2 display-4">#{{ $category }}</h5>
                <p class="mbr-fonts-style mbr-text align-left pt-1 display-7">
                      {{ $memeobj->title }}
                </p>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endsection