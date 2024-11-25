@extends('layouts.default')

{{-- Page title --}}
@section('title')
Attendence @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Attendence</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model(null, ['route' => ['attendences.update', $date], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('attendences.fieldsedit')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
