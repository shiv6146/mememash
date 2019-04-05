@extends('layouts.app')

@section('content')

<section class="mbr-section form1 cid-qIofBG0ijI" id="form1-l" data-sortbtn="btn-primary">
    
    <div class="container" style="padding-top: 90px;">
        <div class="row">
            <div class="col-md-12 col-lg-6 block-content" style="margin: 0px auto;">
            <h4 class="mbr-section-subtitle mbr-fonts-style align-left pb-2 display-5">AS USUAL, GIVE US YOUR DETAILS</h4>
                <h2 class="pb-4 align-left mbr-fonts-style mbr-section-title display-2">Sign up</h2>
                <div data-form-type="formoid">
                    <div id="form-alert" data-form-alert="" hidden="">
                        Thanks for signing up with us!
                    </div>
                    <form class="block mbr-form" action="/mash" method="post" data-form-title="Signup Form">
                        <div class="row">
                            <div class="col-lg-12" data-for="name">
                                <input type="text" class="form-control input" name="name" data-form-field="Name" placeholder="Your Name*" required="" id="name-form1">
                            </div>
                            <div class="col-lg-12" data-for="email">
                                <input type="email" class="form-control input" name="email" data-form-field="Email" placeholder="Email*" required="" id="email-form1">
                            </div>
                            <div class="col-lg-6" data-for="password">
                                <input type="password" class="form-control input" name="password" data-form-field="Password" placeholder="Password*" required="" id="password-form1">
                            </div>
                            <div class="col-lg-6" data-for="confirm-password">
                                <input type="password" class="form-control input" name="confirm-password" data-form-field="ConfirmPassword" placeholder="Confirm Password*" required="" id="confirm-password-form1">
                            </div>
                            <!-- <div class="col-md-12" data-for="message">
                                <textarea class="form-control input" name="message" rows="3" data-form-field="Message" placeholder="Message" id="message-form1-l"></textarea>
                            </div> -->
                            <div class="input-group-btn col-md-12 mt-2 align-left"><button id="signup-btn" href="/mash" type="submit" class="btn btn-form btn-bgr btn-success display-4">Signup</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection