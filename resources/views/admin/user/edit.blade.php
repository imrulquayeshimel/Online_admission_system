@extends('layouts.admin')

@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Create User</h2>
                </div>
                <div class="body">
                    {{Form::model($user,['route'=>['user.update',$user->id],'method'=>'put','class'=>'form-horizontal'])}}
                        @include('includes.errors')

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-6">
                                <div class="form-line">
                                {{Form::text('name',null,['class'=>'form-control','required'=>'','placeholder'=>'name'])}}
                            </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <div class="form-line">
                                {{Form::email('email',null,['class'=>'form-control','required'=>'','placeholder'=>'email'])}}
                            </div>
                            </div>
                        </div>


                        {{-- <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">

                                    <div class="form-line">
                                {{Form::password('password',['class'=>'form-control','required'=>'','placeholder'=>'password'])}}
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-6">
                                <div class="form-line">
                                    {{Form::password('password_confirmation',['class'=>'form-control','required'=>'','placeholder'=>'password confirmation'])}}
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-6">
                                <div class="form-line">
                                    <select id="dept" required class="form-control" name="department">
                                        <option value="">Choose</option>
                                        @foreach ($depts as $d)
                                            <option {{ $user->department_id == $d->id?'selected':''  }} value="{{ $d->id }}">{{ $d->dept }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                <div class="form-line">
                                    <select id="status" required class="form-control" name="status">
                                        <option value="">Choose</option>
                                        <option {{ $user->status == 1?'selected':''  }} value="1">Active</option>
                                        <option {{ $user->status == 0?'selected':''  }} value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <div class="demo-checkbox">
                                        <input {{ $user->is_admin == 1?'checked':''  }} id="is_admin" value="1" type="checkbox" name="is_admin">
                                        <label for="is_admin">Is Admin</label>
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
@section('scripts')
    <script>
        $('#is_admin').change(function(){
            if($(this). prop("checked") == true){
                $('#dept').prop('disabled',true);
            }
            if($(this). prop("checked") == false){
                $('#dept').prop('disabled',false);
            }
        });
        $(document).ready(function(){
            if($('#is_admin').is(':checked')){
                $('#dept').prop('disabled',true);
            }
        });
    </script>
@endsection
