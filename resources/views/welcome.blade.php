@extends('layouts.app')

@section('content')

<section class="header8 cid-qInONdDger mbr-fullscreen" id="header8-0" data-sortbtn="btn-primary">

    <div class="animated-text-background display-7" style="color: rgb(239, 239, 239); opacity: 0.2; font-size: 10rem;">
        <span class="animated-element" data-word="Home to geeky memes" data-speed="60">
        </span>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 align-left img-block">
                <div class="mbr-figure">
                    <img src="{{ asset('img/home.jpg') }}" alt="Responsive HTML template" title="">
                </div>
            </div>
            <div class="mbr-white col-md-6">
                <h4 class="mbr-section-subtitle mbr-fonts-style align-left pb-2 display-5">Are you a <strong>GEEK?</strong></h4>
                <h1 class="mbr-section-title mbr-white mbr-bold mbr-fonts-style align-left display-1">Take your eyes off your code for sometime</h1>
                
                <div class="mbr-section-btn pt-3"><a class="btn btn-lg btn-white display-4" type="submit" href="{{ route('register') }}">Let's Mashup</a></div>
            </div>
        </div>
    </div>
    
</section>

@endsection