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


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('healthmetrics.index') }}" class="btn btn-default">Cancel</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $('.weight, .height').on('keyup', function() {
        alert('hi');
        var weight = $('.weight').val();
        var height = $('.height').val();
        var bmi = weight / (height * height);
        $('.bmi').val(bmi);
    });
</script> --}}