@extends('layouts.default')

{{-- Page title --}}
@section('title')
Assets Categories @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Assets Categories</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($assetsCategory, ['route' => ['assetsCategories.update', $assetsCategory->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('assets_categories.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
