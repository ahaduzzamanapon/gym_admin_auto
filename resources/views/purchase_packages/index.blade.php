@extends('layouts.default')

{{-- Page title --}}
@section('title')
Purchase Packages @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Purchase Packages</h1>
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
            <h5 class="card-title d-inline">Purchase Packages</h5>
            <span class="float-right">
                @if(if_can('show_all_data'))
                    <a class="btn btn-primary pull-right" href="{{ route('purchasePackages.create') }}">Add New</a>
                @endif
            </span>
        </section>
        <div class="card-body">
            @include('purchase_packages.table')
        </div>
    </div>
    {{-- <div class="text-center">
        @include('adminlte-templates::common.paginate', ['records' => $purchasePackages])
    </div> --}}
</div>
@endsection
