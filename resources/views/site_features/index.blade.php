@extends('layouts.default')

{{-- Page title --}}
@section('title')
Site Features @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Site Features</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<!-- Main content -->
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="card">
        <section class="card-header">
            <h5 class="card-title d-inline">Site Features</h5>
            <span class="float-right">
                <a class="btn btn-primary pull-right" href="{{ route('siteFeatures.create') }}">Add New</a>
            </span>
        </section>
        <div class="card-body">
            @include('site_features.table')
        </div>
    </div>
    <div class="text-center">
        
        @include('adminlte-templates::common.paginate', ['records' => $siteFeatures])

    </div>
</div>
@endsection
