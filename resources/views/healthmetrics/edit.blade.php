@extends('layouts.default')

{{-- Page title --}}
@section('title')
Health Metrics @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Health Metrics</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($healthmetrics, ['route' => ['healthmetrics.update', $healthmetrics->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('healthmetrics.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
