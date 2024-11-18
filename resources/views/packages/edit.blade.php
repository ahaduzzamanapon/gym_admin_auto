@extends('layouts.default')

{{-- Page title --}}
@section('title')
Package @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Package</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($package, ['route' => ['packages.update', $package->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('packages.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
