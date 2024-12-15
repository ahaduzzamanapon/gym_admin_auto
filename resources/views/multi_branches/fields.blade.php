<!-- Branch Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('branch_name', 'Branch Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('branch_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Address Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('address', 'Address:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Phone Number Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('phone_number', 'Phone Number:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Email Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('email', 'Email:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Manager Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('manager_name', 'Manager Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('manager_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('multiBranches.index') }}" class="btn btn-danger">Cancel</a>
</div>
