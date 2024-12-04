<!-- Member name Field -->

@php
$members = DB::table('members')->get();
@endphp

<div class="form-group">
    <div class="row">
        {!! Form::label('member_id', 'Member:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('member_id', $members->pluck('mem_name', 'id')->prepend('Select Member', ''), null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Measurement Date Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('measurement_date', 'Measurement Date:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::date('measurement_date', null, ['class' => 'form-control','id'=>'measurement_date']) !!}
        </div>
    </div>
</div>




<!-- Weight Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('weight', 'Weight:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('weight', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Height Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('height', 'Height:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('height', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Bmi Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('bmi', 'Bmi:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('bmi', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>



<!-- Body Fat Percentage Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('body_fat_percentage', 'Body Fat Percentage:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('body_fat_percentage', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Muscle Mass Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('muscle_mass', 'Muscle Mass:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('muscle_mass', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Hydration Level Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('hydration_level', 'Hydration Level:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('hydration_level', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<!-- Chest Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('chest', 'Chest:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('chest', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Waist Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('waist', 'Waist:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('waist', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Hips Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('hips', 'Hips:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('hips', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Thighs Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('thighs', 'Thighs:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('thighs', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Arms Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('arms', 'Arms:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('arms', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Forearms Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('forearms', 'Forearms:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('forearms', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Neck Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('neck', 'Neck:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('neck', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Shoulders Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('shoulders', 'Shoulders:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('shoulders', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Calves Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('calves', 'Calves:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('calves', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Resting Heart Rate Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('resting_heart_rate', 'Resting Heart Rate:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('resting_heart_rate', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('healthmetrics.index') }}" class="btn btn-default">Cancel</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

