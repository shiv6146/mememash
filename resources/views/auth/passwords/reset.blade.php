@extends('layouts.app')

@section('content')

<section class="mbr-section form1 cid-qIofBG0ijI" id="form1-l" data-sortbtn="btn-primary">
    
    <div class="container" style="padding-top: 90px;">
        <div class="row">
            <div class="col-md-12 col-lg-6 block-content" style="margin: 0px auto;">
            <h4 class="mbr-section-subtitle mbr-fonts-style align-left pb-2 display-5">NOW THAT YOU HAVE RECEIVED AN EMAIL</h4>
                <h2 class="pb-4 align-left mbr-fonts-style mbr-section-title display-2">You can set a new password</h2>
                <div data-form-type="formoid">
                    <form class="block mbr-form" action="{{ route('password.reset') }}" method="post" data-form-title="Reset Form">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                            
                            <div class="col-lg-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-lg-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required placeholder="Email*">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-lg-12">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password*">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                <div class="col-lg-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password*">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- <div class="col-md-12" data-for="message">
                                <textarea class="form-control input" name="message" rows="3" data-form-field="Message" placeholder="Message" id="message-form1-l"></textarea>
                            </div> -->
                            <div class="input-group-btn col-md-12 mt-2 align-left"><button id="signup-btn" type="submit" class="btn btn-form btn-bgr btn-success display-4">Reset Password</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
