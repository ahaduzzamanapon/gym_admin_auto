@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Features @parent
@stop

@section('content')
    <section class="content-header">
        <div aria-label="breadcrumb" class="card-breadcrumb">
            <h1>{{ __('Edit') }} Features</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                {!! Form::model($feature, [
                    'route' => ['features.update', $feature->id],
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <!-- Title Field -->
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('title', 'Title:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
                        <div class="col-md-9 col-lg-9 col-12">
                            {!! Form::text('title', $feature->title, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <!-- Image Field -->
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('image', 'Image:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
                        <div class="col-md-9 col-lg-9 col-12">
                            @if (!empty($feature->image))
                                <img src="{{ asset($feature->image) }}" alt="Feature Image" class="img-thumbnail mb-3"
                                    style="max-width: 200px; max-height: 200px;">
                            @endif
                            {!! Form::file('image', ['class' => 'form-control']) !!}
                            <p class="text-danger">Image Size Must Be Under 2MB</p>
                        </div>
                    </div>
                </div>

                <!-- Status Field -->
                <div class="form-group">
                    <div class="row">
                        {!! Form::label('status', 'Status:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
                        <div class="col-md-9 col-lg-9 col-12">
                            {!! Form::select('status', ['2' => 'Inactive', '1' => 'Active'], $feature->status, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('features.index') }}" class="btn btn-danger">Cancel</a>
                </div>


                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
