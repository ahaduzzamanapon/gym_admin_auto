@extends('layouts.default')

{{-- Page title --}}
@section('title')
Add Meal Chart @parent
@stop

@section('content')
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Add Meal Chart</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<div class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('meal_plans.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Meal Name</label>
                            <input type="text" name="meal_name" class="form-control" placeholder="Enter meal name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h1>Meal Plan</h1>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="display:none">Meal Name</th>
                                        <th>Meal Time</th>
                                        <th>Food Items</th>
                                        <th>Quantity</th>
                                        <th>Calories</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $day_array = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                        $meal_time = ['Breakfast', 'Lunch', 'Snack', 'Dinner'];
                                    @endphp
                                    @foreach ($day_array as $day)
                                        <!-- Day Row -->
                                        <tr >
                                            <td colspan="4" class="bg-light font-weight-bold text-center">
                                                {{ $day }}
                                            </td>
                                        </tr>
                                        <!-- Meal Time Rows -->
                                        @foreach ($meal_time as $time)
                                        <tr>
                                            <td style="display:none">
                                                <div class="form-group">
                                                    <input type="text" name="meal_name_f[]" value="{{ $day }}" class="form-control" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="meal_time[]" value="{{ $time }}" class="form-control" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="food_items[]" value="{{ $day }} {{ $time }}" class="form-control" placeholder="Enter food items">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="quantity[]" value="{{rand(1, 5)}}" class="form-control" placeholder="Enter quantity">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="calories[]" value="{{rand(1, 5)}}" class="form-control" placeholder="Enter calories">
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="text-align-last: right;">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('meal_plans.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
