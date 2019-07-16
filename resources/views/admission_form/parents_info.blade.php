<div class="col-md-6">
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('father_name', null, ['class'=>'form-control']) !!}
            <label class="form-label">Father's Name</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('father_occupation', null, ['class'=>'form-control']) !!}
            <label class="form-label">Occupation</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('father_contact', null, ['class'=>'form-control']) !!}
            <label class="form-label">Contact Number</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="">
            <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Photo(<small>300x300</small>)</label>
            {!! Form::file('father_photo', []) !!}

        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('mother_name', null, ['class'=>'form-control']) !!}
            <label class="form-label">Mother's Name</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('mother_occupation', null, ['class'=>'form-control']) !!}
            <label class="form-label">Occupation</label>
        </div>
    </div>

    <div class="form-group form-float">
        <div class="form-line">
            {!! Form::text('mother_contact', null, ['class'=>'form-control']) !!}
            <label class="form-label">Contact Number</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="">
            <label style="color: #AAAAAA;font-weight: normal;" class="form-label">Photo(<small>300x300</small>)</label>
            {!! Form::file('mother_photo', []) !!}

        </div>
    </div>

</div>
