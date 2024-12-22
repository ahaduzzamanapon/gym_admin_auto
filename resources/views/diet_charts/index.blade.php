@extends('layouts.default')

{{-- Page title --}}
@section('title')
Diet Charts @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Diet Charts</h1>
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
            <h5 class="card-title d-inline">Diet Charts</h5>
            <span class="float-right">
                @if(if_can('member_manage'))

                <a class="btn btn-primary pull-right" href="{{ route('diet_charts.create') }}">Add New</a>
                @endif
            </span>
        </section>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Member Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Target</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dietCharts as $dietChart)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dietChart->member_name }}</td>
                            <td>{{ $dietChart->age }}</td>
                            <td>{{ $dietChart->gender }}</td>
                            <td>{{ $dietChart->goal }}</td>
                            <td>
                                @if(if_can('member_manage'))

                                <a href="{{ route('diet_charts.edit', $dietChart->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('diet_charts.destroy', $dietChart->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                @endif
                                <a href="{{ route('diet_charts.show',$dietChart->id) }}" class="btn btn-info btn-sm">View Details</a>
                                <a href="{{ route('diet_charts.print',$dietChart->id) }}" class="btn btn-info btn-sm"><i class="im im-icon-Printer"></i>Print</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        {{ $dietCharts->links() }}
    </div>
</div>
@endsection
