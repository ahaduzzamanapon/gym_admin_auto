@extends('layouts.default')

{{-- Page title --}}
@section('title')
Daily Workouts @parent
@stop

@section('content')
   <section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>{{ __('Edit') }} Daily Workouts</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="card">
           <div class="card-body">
                {!! Form::model($dailyWorkouts, ['route' => ['dailyWorkouts.update', $dailyWorkouts->id], 'method' => 'patch','class' => 'form-horizontal']) !!}

                    @include('daily_workouts.fields')

                {!! Form::close() !!}
           </div>
       </div>
   </div>
@endsection
