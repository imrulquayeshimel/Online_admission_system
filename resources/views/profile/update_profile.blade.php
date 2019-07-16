@extends('layouts.common')
@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Profile details</h2>
                </div>
                <div class="body">
                    {!! Form::model($profile, ['route'=>'profile.update','class'=>'form-horizontal','method'=>'put']) !!}
                        @include('includes.errors')
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-7">
                                <div class="form-line">
                                    {{Form::text('name',null,['class'=>'form-control','required'=>'','placeholder'=>'Name'])}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-7">
                                <div class="form-line">
                                    {{Form::text('email',null,['class'=>'form-control','required'=>'','placeholder'=>'Email'])}}
                                </div>
                                <small> <b>Note:</b> If you change the email, you will be automatically signed out and deactivated</small>
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
