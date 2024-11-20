@extends('layouts.default')

{{-- Page title --}}
@section('title')
Edit Meal Chart @parent
@stop

@section('content')
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Edit Meal Chart</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<div class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('meal_plans.update', $mealPlan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div>
                        <div class="form-group">
                            <label>Meal Name</label>
                            <input type="text" name="meal_name" value="{{ $mealPlan->meal_name }}" class="form-control" placeholder="Enter customer name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ $mealPlan->description }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h1>Meal Plan</h1>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Meal Name</th>
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
                                    $sl=0;
                                    @endphp
                                    @foreach ($day_array as $day)
                                        <!-- Day Row -->
                                        <tr>
                                            <td colspan="5" class="bg-light font-weight-bold text-center">
                                                {{ $day }}
                                            </td>
                                        </tr>
                                        <!-- Meal Time Rows -->
                                        @foreach ($meal_time as $time)
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="meal_name[]" value="{{$foodplans[$sl]->meal_name}}" class="form-control" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="meal_time[]" value="{{ $foodplans[$sl]->meal_time }}" class="form-control" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="food_items[]" value="{{ $foodplans[$sl]->food_items }}" class="form-control" placeholder="Enter food items">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="quantity[]" value="{{ $foodplans[$sl]->quantity }}" class="form-control" placeholder="Enter quantity">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="calories[]" value="{{ $foodplans[$sl]->calories }}" class="form-control" placeholder="Enter calories">
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $sl++;
                                        @endphp
                                        @endforeach
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="text-align-last: right;">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('meal_plans.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
