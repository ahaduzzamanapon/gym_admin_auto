@extends('layouts.default')

{{-- Page title --}}
@section('title')
Product @parent
@stop

@section('content')
    <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Create New') }} Product</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'products.store', 'files' => true,'class' => 'form-horizontal']) !!}

                    @include('products.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
