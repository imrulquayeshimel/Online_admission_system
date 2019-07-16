@extends('layouts.admin')

@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Create Application Deadline</h2>
                </div>
                <div class="body">
                    {{Form::open(['route'=>'application-deadlines.store','method'=>'post','class'=>'form-horizontal'])}}
                    @include('includes.errors')

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Exam Season</label>
                        <div class="col-sm-6">
                            <div class="form-line">
                                {!! Form::select('exam_season', [''=>'Choose']+$exam_seasons, null, ['class'=>'form-control','required'=>'']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Deadline</label>
                        <div class="col-sm-6">
                            <div class="form-line">
                                {!! Form::text('deadline', null, [
                                    'class'=>'form-control',
                                    'autocomplete'=>'off',
                                    'data-toggle'=>'datepicker',
                                    'placeholder'=>'dd-mm-yyyy',
                                    'required'=>''
                                ]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <div class="pull-right">
                                {{Form::submit('Save',['class'=>'btn btn-success'])}}
                                <input class="btn btn-danger" type="reset" value="Reset">
                            </div>
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection
