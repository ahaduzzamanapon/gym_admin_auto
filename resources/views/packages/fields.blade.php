<!-- Pack Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_name', 'Pack Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('pack_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- Pack Admission Fee Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_admission_fee', 'Pack Admission Fee:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('pack_admission_fee', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Pack Duration Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_duration', 'Pack Duration:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('pack_duration', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- Pack Status Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_status', 'Pack Status:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('pack_status', ['2' => 'Inactive', '1' => 'Active'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('packages.index') }}" class="btn btn-default">Cancel</a>
</div>
