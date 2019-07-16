@extends('layouts.front')
@section('content')
    <div class="card">
        <div class="body">
            <div class="text-center">
                <img style="min-width: 70px" src="{{ asset('images/logo/gb_logo.png') }}" width="7%" alt="">
                <span style="line-height:12px">
                    <h2 style="padding:0">Gono Bishwabidyalay</h2>
                    <p><b>Exam Season:</b> {{ $ad?$ad->examSeason->exam_season:'' }}</p>
                    <p><b>Registration Deadline:</b> {{ $ad?$ad->deadline:'' }}</p>
                    <p class="text-danger"><b>Registration Token:</b> {{ $reg_token }} </p>
                </span>
            </div>
            <div class="form-horizontal">
                <div class="form-group form-float">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Department</label>
                        <div class="col-sm-6">
                            <div class="form-line">
                                {!! Form::select('exam_season', [''=>'Choose']+$depts, null, ['class'=>'form-control','required'=>'','id'=>'dept']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (!count($depts))
                <div class="text-center">
                    <p class="text-danger"> <strong>Note:</strong> Application season are not available </p>
                </div>
            @endif
        </div>
    </div>
    <img id="form_front_img" width="100%" style="padding-bottom:30px" src="{!! asset('images/gb.jpg') !!}" alt="">
    <div hidden id="admission_form" class="card">
        <div class="header">
            <h2>ADMISSION FORM</h2>
        </div>
        <div class="body">
            {!! Form::open(['route'=>'admission-form.store','method'=>'post','class'=>'my_form','id'=>'wizard_with_validation','enctype' => 'multipart/form-data']) !!}
                @include('includes.errors')

                <input id="reg_token" type="text" name="reg_token" value="{{ $reg_token }}">
                <input id="dept_id" type="text" name="department_id" value="">
                <input hidden type="text" name="exam_season_id" value="{{ $ad?$ad->exam_season_id:'' }}">

                {{-- <h3>Payment</h3>
                <fieldset>
                    @include('admission_form.payment')
                </fieldset> --}}

                <h3>Student Information</h3>
                <fieldset>
                    @include('admission_form.student_info')
                </fieldset>

                <h3>Educational Qualification</h3>
                <fieldset>
                    @include('admission_form.edu_qua')
                </fieldset>

                <h3>Parents Information</h3>
                <fieldset>
                    @include('admission_form.parents_info')
                </fieldset>

                <h3>Guardian Information</h3>
                <fieldset>
                    @include('admission_form.guardian_info')
                </fieldset>

                <h3>Terms & Conditions - Finish</h3>
                <fieldset>
                    <h4 class="text-danger">{{ config('app.reg_token_alert') }}</h4>
                    <ul>
                        <li>1. Every student must  follow the administration rules and coditions.</li>
                        <li>2. Every student should  attend more than 70% in all the courses, unless she/he will not be able to seat in exam.</li>
                        <li>3. All kind of religious costumes must be forbidden for all the students.</li>
                        <li>4. Any kind of Ragging or student harrasment must be forbidden.</li>
                        <li>5. Always wear ID card in campuss otherwise you should be fined.</li>
                        <li>6. Always remembar the liberation war and show respect for the freedom fighters.</li>
                    </ul>
                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                </fieldset>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- <div class="text-center">
        <img width="100%" src="{{ asset('images/gb.jpg') }}" alt="">
    </div> --}}
@endsection
@section('scripts')
    <script>
        $('#dept').on('change',function() {
            if ($(this).val()) {
                $('#admission_form').prop('hidden',false);
                $('#form_front_img').prop('hidden',true);

                $('#dept_id').val($(this).val())
                $('#dept_id').prop('hidden',true)
                $('#reg_token').prop('hidden',true)
            }else {
                $('#admission_form').prop('hidden',true);
                $('#form_front_img').prop('hidden',false);
            }
        });
        $('#ssc_gpa').keyup(function() {
            alert('ok')
        });
    </script>
    <script  type="text/javascript">
        function gpaAlert(gpa,field_id) {
            if (parseFloat(2.5)>parseFloat(gpa) || parseFloat(gpa)>parseFloat(5)) {
                $('#'+field_id).prop('hidden',false)
            }else {
                $('#'+field_id).prop('hidden',true)
            }
        }
    </script>

@endsection
