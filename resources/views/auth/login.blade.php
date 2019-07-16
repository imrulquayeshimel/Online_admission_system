@extends('layouts.front')
@section('content')
    <div class="card">
        <div class="header">
            <h2>
                Login
            </h2>
        </div>
        <div class="body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                {{-- @if ($errors->has('active'))
                    <div class="text-center">
                        <span class="help-block">
                            <strong>{{ $errors->first('active') }}</strong>
                        </span>
                    </div>
                @endif --}}
                <div class="row clearfix{{ $errors->has('email') || $errors->first('active') ? ' has-error' : '' }}">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5 form-control-label">
                        <label for="email_address_2">Email Address</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="email" type="text" id="email_address_2" class="form-control" placeholder="Enter your email address">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5 form-control-label">
                        <label for="password_2">Password</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input name="password" type="password" id="password_2" class="form-control" placeholder="Enter your password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-5">
                        <input type="checkbox" id="remember_me_3" class="filled-in" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember_me_3">Remember Me</label>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-5">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
