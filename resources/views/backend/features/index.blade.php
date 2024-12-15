@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Features @parent
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div aria-label="breadcrumb" class="card-breadcrumb">
            <h1>Features</h1>
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
                <h5 class="card-title d-inline">Features</h5>
                <span class="float-right">
                    @if (if_can('features'))
                        <a class="btn btn-primary pull-right" href="{{ route('features.create') }}">Add New</a>
                    @endif
                </span>
            </section>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="features-table">
                        <thead>
                            <tr>
                                <th>Srial No</th>
                                <th>Features Image</th>
                                <th>Features Title</th>
                                <th>Status</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $key => $feature)
                                <tr>
                                    <td>{{  ++$key }}</td>
                                    <td>
                                        <img src="{{asset($feature->image)}}" alt="Feature Image" class="img-thumbnail" style="max-width: 120px; max-height: 120px;">

                                    </td>
                                    <td>{{ $feature->title }}</td>
                                    <td>
                                        @if ($feature->status == 1)
                                            <span class="btn btn-success">Active</span>
                                        @else
                                            <span class="btn btn-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['features.destroy', $feature->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            {{-- <a href="{{ route('features.show', [$feature->id]) }}"
                                                class='btn btn-outline-primary btn-xs'><i
                                                    class="im im-icon-Eye" data-placement="top" title="View"></i></a> --}}
                                            <a href="{{ route('features.edit', [$feature->id]) }}"
                                                class='btn btn-outline-primary btn-xs'><i
                                                    class="im im-icon-Pen"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                                            {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', [
                                                'type' => 'submit',
                                                'class' => 'btn btn-outline-danger btn-xs',
                                                'onclick' => "return confirm('Are you sure?')",
                                            ]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="text-center">

            @include('adminlte-templates::common.paginate', ['records' => $features])

        </div>
    </div>
@endsection
