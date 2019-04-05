@extends('layouts.app')

@section('content')

<section class="mbr-section form1 cid-qIofBG0ijI" id="form1-l" data-sortbtn="btn-primary">
    
    <div class="container" style="padding-top: 90px;">
        <div class="row">
            <div class="col-md-12 col-lg-6 block-content" style="margin: 0px auto;">
            <h4 class="mbr-section-subtitle mbr-fonts-style align-left pb-2 display-5">FOUND SOMETHING REALLY GEEKY</h4>
                <h2 class="pb-4 align-left mbr-fonts-style mbr-section-title display-2">Do share it with us</h2>
                <div data-form-type="formoid">
                    <form id="postform" class="block mbr-form" action="{{ route('mash') }}" method="get" data-form-title="Post Form">
                        {{ csrf_field() }}
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <input id="url" type="url" class="form-control" name="url" required placeholder="Paste an image url">
                            </div>

                            <div class="col-lg-12">
                                <input id="category" type="text" class="form-control" name="category" required placeholder="Meme category">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control input" name="title" rows="3" placeholder="Give a brief title about the meme" id="title" required></textarea>
                            </div>

                            <div class="input-group-btn col-md-12 mt-2 align-left"><button id="postbtn" type="submit" class="btn btn-form btn-bgr btn-success display-4">Post Meme</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection