@extends('layouts.default')

{{-- Page title --}}
@section('title')
About Us @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} About Us</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($aboutUs, ['route' => ['aboutuses.update', $aboutUs->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('aboutuses.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
