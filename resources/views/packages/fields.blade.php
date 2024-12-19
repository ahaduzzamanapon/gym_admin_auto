<!-- Pack Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_name', 'Pack Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('pack_name', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>
@php
$multi_branchs = DB::table('multi_branchs')->get();
@endphp
<!-- group Img Url Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('branch_id', 'Branch:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('branch_id', $multi_branchs->pluck('branch_name', 'id')->prepend('Select Branch', ''), null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>


<!-- Pack Admission Fee Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_admission_fee', 'Pack Admission Fee:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('pack_admission_fee', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>


<!-- Pack Duration Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_duration', 'Pack Duration (Month):',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('pack_duration', null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>


<!-- Pack Status Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_status', 'Pack Status:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('pack_status', ['2' => 'Inactive', '1' => 'Active'], null, ['class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>
<!-- Pack Image Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('pack_image', 'Pack Image:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::file('pack_image', ['class' => 'form-control', 'accept' => 'image/*']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('packages.index') }}" class="btn btn-danger">Cancel</a>
</div>
