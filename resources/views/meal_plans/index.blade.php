@extends('layouts.default')

{{-- Page title --}}
@section('title')
Meal Charts @parent
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Meal Charts</h1>
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
            <h5 class="card-title d-inline">Meal Charts</h5>
            <span class="float-right">
                @if(if_can('member_manage'))

                <a class="btn btn-primary pull-right" href="{{ route('meal_plans.create') }}">Add New</a>
                @endif
            </span>
        </section>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Meal Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mealPlans as $dietChart)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dietChart->meal_name }}</td>
                          
                            <td>
                                @if(if_can('member_manage'))

                                <a href="{{ route('meal_plans.edit', $dietChart->id) }}" class="btn btn-warning btn-sm"><i class="im im-icon-Pen"></i>Edit</a>
                                <a href="{{ route('meal_plans.print', $dietChart->id) }}" class="btn btn-info btn-sm" target="_blank"><i class="im im-icon-Printer"></i>Print</a>
                                <form action="{{ route('meal_plans.destroy', $dietChart->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="im im-icon-Remove"></i>Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        {{ $mealPlans->links() }}
    </div>
</div>
@endsection
