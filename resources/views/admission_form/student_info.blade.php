<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('name', null, ['class'=>'form-control','required'=>'']) !!}
        <label class="form-label">Name*</label>
    </div>
</div>

<div class="form-group form-float">
    <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Date of Birth*</label>
    <div class="form-line">
        {!! Form::text('date_of_birth', null, [
            'class'=>'form-control',
            'autocomplete'=>'off',
            'data-toggle'=>'datepicker',
            'required'=>''
        ]) !!}
    </div>
</div>

<div class="form-group form-float">
    <div class="">
        <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Gender</label>
        {!! Form::radio('gender', 1, null, ['class'=>'radio-col-deep-purple','id'=>'radio_9']) !!}
        <label for="radio_9">Male</label>
        {!! Form::radio('gender', 2, null, ['class'=>'radio-col-deep-purple','id'=>'radio_10']) !!}
        <label for="radio_10">Female</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="">
        <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Photo</label>
        {!! Form::file('photo', []) !!}

    </div>
</div>

<div class="form-group form-float">
    <div class="">
        <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Blood Group</label>
        {!! Form::select('blood_group', [''=>'Choose']+$blood_group, null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
        <label class="form-label">Email</label>
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('contact_number', null, ['class'=>'form-control','required'=>'']) !!}
        <label class="form-label">Contact Number*</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::textarea('present_address', null, ['class'=>'form-control no-resize','size'=>'30x3']) !!}
        <label class="form-label">Present Address</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::textarea('permanent_address', null, ['class'=>'form-control no-resize','size'=>'30x3']) !!}
        <label class="form-label">Permanent Address</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('nationality', null, ['class'=>'form-control']) !!}
        <label class="form-label">Nationality</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('religion', null, ['class'=>'form-control']) !!}
        <label class="form-label">Religion</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="">
        <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Signature</label>
        {!! Form::file('signature', []) !!}

    </div>
</div>
