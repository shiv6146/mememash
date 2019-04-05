@extends('layouts.app')

@section('content')

<section class="features9 popup-btn-cards cid-qInZUFhVFJ" id="features9-9" data-sortbtn="btn-primary">

    <div class="container" style="padding-top: 90px;">
        <h2 class="align-center mbr-fonts-style mbr-section-title display-2" style="text-align: center;">HIT LEFT OR RIGHT ARROW TO CHOOSE YOUR WINNER</h2>
        
        
        <div class="row main justify-content-center">
            <div class="col-lg-6 p-4">
                <div class="image-element card-wrapper popup-btn">
                    <img id="m1" name="{{ $m1_id }}" src="{{ asset('img/m1.') . $m1_ext }}" alt="" title="">
                    <div id="m1overlay" class="mbr-overlay card-overlay"></div>
                    <div id="m1wrapper" class="wrapper">
                        <div class="collapsed-content">
                            <p class="mbr-text mbr-white mbr-fonts-style display-7" style="text-align: center;">
                                <span style='font-size:100px;'>&#128077;</span>
                            </p>
                        </div>
                   </div>
               </div>
            </div>
            <div class="col-lg-6 p-4">
                <div class="image-element card-wrapper popup-btn">
                    <img id="m2" name="{{ $m2_id }}" src="{{ asset('img/m2.') . $m2_ext }}" alt="" title="">
                    <div id="m2overlay" class="mbr-overlay card-overlay"></div>
                    <div id="m2wrapper" class="wrapper">
                        <div class="collapsed-content">
                            <p class="mbr-text mbr-white mbr-fonts-style display-7" style="text-align: center;">
                                <span style='font-size:100px;'>&#128077;</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script src="{{ asset('js/mash.js') }}"></script>