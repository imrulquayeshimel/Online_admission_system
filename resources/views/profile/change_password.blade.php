@extends('layouts.common')
@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Change Password</h2>
                </div>
                <div class="body">
                    {!! Form::model($profile, ['route'=>'password.update','class'=>'form-horizontal','method'=>'put']) !!}
                        @include('includes.errors')
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Old Password</label>
                            <div class="col-sm-7">
                                <div class="form-line">
                                    {{Form::password('old_password',['class'=>'form-control','required'=>'','placeholder'=>'Old Password'])}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">New Password</label>
                            <div class="col-sm-7">
                                <div class="form-line">
                                    {{Form::password('password',['class'=>'form-control','required'=>'','placeholder'=>'New Password'])}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Confirm Password</label>
                            <div class="col-sm-7">
                                <div class="form-line">
                                    {{Form::password('password_confirmation',['class'=>'form-control','required'=>'','placeholder'=>'password confirmation'])}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-7">
                                <div class="pull-right">
                                    {{Form::submit('Update',['class'=>'btn btn-success'])}}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
