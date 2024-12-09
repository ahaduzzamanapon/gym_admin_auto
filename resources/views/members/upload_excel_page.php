@extends('layouts.default')

{{-- Page title --}}
@section('title')
Members @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Members</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<!-- Main content -->
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="card" style="width: 88vw;">
        <section class="card-header">
            <h5 class="card-title d-inline">Members</h5>
        </section>
        <div class="card-body table-responsive">
            
        </div>
    </div>
    <div class="text-center">
        
    </div>
</div>
@endsection