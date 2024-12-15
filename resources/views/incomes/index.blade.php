@extends('layouts.default')

{{-- Page title --}}
@section('title')
Incomes @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Incomes</h1>
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
            <h5 class="card-title d-inline">Incomes</h5>
            <span class="float-right">
                <a class="btn btn-primary pull-right" href="{{ route('incomes.create') }}">Add New</a>
            </span>
        </section>
        <div class="card-body">
            @include('incomes.table')
        </div>
    </div>
    <div class="text-center">
        
    </div>
</div>
@endsection
