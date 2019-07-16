<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('guardian_name', null, ['class'=>'form-control']) !!}
        <label class="form-label">Guardian Name</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="">
        <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Photo</label>
        {!! Form::file('guardian_photo', []) !!}

    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('guardian_occupation', null, ['class'=>'form-control']) !!}
        <label class="form-label">Occupation</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::number('guardian_salary', null, ['class'=>'form-control']) !!}
        <label class="form-label">Salary</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::email('guardian_email', null, ['class'=>'form-control']) !!}
        <label class="form-label">Email</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('guardian_contact_number', null, ['class'=>'form-control']) !!}
        <label class="form-label">Contact Number</label>
    </div>
</div>

<div class="form-group form-float">
    <div class="form-line">
        {!! Form::text('relationship_of_student', null, ['class'=>'form-control']) !!}
        <label class="form-label">Relationship of Student</label>
    </div>
</div>
<div class="form-group form-float">
    <div class="">
        <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Signature</label>
        {!! Form::file('guardian_signature', []) !!}

    </div>
</div>
