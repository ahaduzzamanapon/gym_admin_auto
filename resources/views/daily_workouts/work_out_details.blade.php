@extends('layouts.default')
@section('title')
Daily Workouts Details @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Daily Workouts Details</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<!-- Main content -->
<div class="content">
    <div class="card" width="88vw;">



    <section>
        <div class="card-header">
            <h5 class="card-title d-inline">Daily Workouts Details</h5>
            <span class="float-right">
                <a class="btn btn-primary btn-sm pull-right" onclick="history.go(-1);">Back</a>
            </span> 
        </div>

<div class="card-body mt-5">
      <!-- Name Field -->
       
<div class="row">
    <div class="col-md-4">
        <span>Name: {{ $dailyWorkoutsDetails[0]->mem_name}} </span>
    </div>
    <div class="col-md-4">
        <span>Sl. No:  {{ $dailyWorkoutsDetails[0]->mem_name}} </span>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4">
@php
    $date1 = \Carbon\Carbon::now(); // Today's date
    $date2 = \Carbon\Carbon::parse($dailyWorkoutsDetails[0]->date_of_birth); // Date of birth
    $age = $date1->diffInYears($date2); // Difference in years
@endphp

<p>Age: {{ $age}}</p>
    </div>
    <div class="col-md-4">
        <span>Sex:  {{ $dailyWorkoutsDetails[0]->mem_gender}} </span>
    </div>
    <div class="col-md-4">
        <span>Date: @php  echo date('Y-m-d') @endphp </span>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4">
        <span>Duration:  {{ $dailyWorkoutsDetails[0]->duration}} </span>
    </div>
</div>

  <!-- </div>? -->
    </section>
       <table class="table">
            <thead>
                <tr class='text-center'>
                    <td>Category</td>
                    <td>Exercise Name</td>
                    <td>Reputaion</td>
                    <td>Sets</td>
                    <td>Duration Minutes</td>
                </tr>
            </thead>
            <tbody>
                @foreach($dailyWorkoutsDetails as $row)
                    @php
                        $category_title = DB::table('workout_categorys')->where('id', $row->workout_category)->first();
                    @endphp
                <tr class='text-center'>
                    <td>{{ $category_title->title }}</td>
                    <td>{{ $row->exercise_name }}</td>
                    <td>{{ $row->reputation }}</td>
                    <td>{{ $row->sets }}</td>
                    <td>{{ $row->duration_minutes }}</td>
                </tr>
                @endforeach
            </tbody>
       </table>
    </div>
</div>  
@endsection

