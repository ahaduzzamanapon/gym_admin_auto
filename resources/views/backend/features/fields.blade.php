<!-- Feature Title Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('feature_title', 'Feature Title:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('feature_title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Feature Image Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('feature_image', 'Feature Image:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::file('feature_image', ['class' => 'form-control']) !!}
            <p class="text-danger">Image Size Must Be Under 2MB</p>
        </div>
    </div>
</div>

<!-- Feature Status Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('feature_status', 'Status:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('feature_status', ['2' => 'Inactive', '1' => 'Active'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('features.index') }}" class="btn btn-danger">Cancel</a>
</div>
