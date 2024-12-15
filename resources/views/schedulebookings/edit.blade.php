@extends('layouts.default')

{{-- Page title --}}
@section('title')
Schedule Booking @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Schedule Booking</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($schedulebooking, ['route' => ['schedulebookings.update', $schedulebooking->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('schedulebookings.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
