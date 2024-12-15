@extends('layouts.default')

@section('title')
Sales @parent
@stop

@section('content')
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Sales</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<div class="content">
    <div class="clearfix"></div>
    @include('flash::message')
    <div class="clearfix"></div>

    <div class="card">
        <section class="card-header">
            <h5 class="card-title d-inline">Sales</h5>
            <span class="float-right">
                <a class="btn btn-primary" href="{{ route('sales.create') }}">Add New Sale</a>
            </span>
        </section>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Member</th>
                        <th>Branch</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->member->mem_name }}</td>
                        <td>{{ $sale->member->branch_name }}</td>
                        <td>{{ $sale->sale_date }}</td>
                        <td>{{ $sale->total_amount }}</td>
                        <td>{{ $sale->status }}</td>
                        <td>
                            {{-- <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info">View</a> --}}
                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-primary">Edit</a>
                            <a target="_blank" href="{{ route('sales.invoice', $sale->id) }}" class="btn btn-success">Invoice</a>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
