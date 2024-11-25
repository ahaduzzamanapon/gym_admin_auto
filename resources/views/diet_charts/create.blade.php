@extends('layouts.default')

{{-- Page title --}}
@section('title')
Add Diet Chart @parent
@stop

@section('content')
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Add Diet Chart</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<div class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('diet_charts.store')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Member Name</label>
                            <select name="member_name" class="form-control" id="member_name">
                                @php
                                    $members = DB::table('members')->get();
                                @endphp
                                @foreach ($members as $member)
                                    <option value="{{ $member->mem_name }},{{ $member->id }}">{{ $member->mem_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control"  required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="Male" >Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input type="number" name="height" class="form-control"  step="0.01" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Weight (kg)</label>
                            <input type="number" name="weight" class="form-control"  step="0.01" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Body Fat Percentage (%)</label>
                            <input type="number" name="body_fat_percentage" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Target</label>
                            <select name="goal" class="form-control" required>
                                <option value="Weight Loss">Weight Loss</option>
                                <option value="Muscle Gain">Muscle Gain</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Meal Preference</label>
                            <select name="meal_preference" class="form-control" required>
                                <option value="Vegetarian" >Vegetarian</option>
                                <option value="Non-Vegetarian" >Non-Vegetarian</option>
                                <option value="Vegan" >Vegan</option>
                                <option value="Pescatarian" >Pescatarian</option>
                                <option value="Other" >Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Caloric Requirement (kcal)</label>
                            <input type="number" name="caloric_requirement" class="form-control"  required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Protein (grams)</label>
                            <input type="number" name="protein_grams" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Carbohydrates (grams)</label>
                            <input type="number" name="carbs_grams" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fats (grams)</label>
                            <input type="number" name="fats_grams" class="form-control" step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Water Intake (liters)</label>
                            <input type="number" name="water_intake" class="form-control" step="0.01">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Meal Plan</label>
                            <select name="meal_plan_id" class="form-control" required>

                                <option value="" >Select Meal Plan</option>
                                @php
                                    $meal_plans = DB::table('meal_plans')->get();
                                @endphp
                                @foreach ($meal_plans as $meal_plan)
                                    <option value="{{ $meal_plan->id }}">{{ $meal_plan->meal_name }}</option>
                                @endforeach
                               
                            </select>
                           
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>From date</label>
                            <input type="date" name="from_date" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>To date</label>
                            <input type="date" name="to_date" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Special Instructions</label>
                            <textarea name="special_instructions" class="form-control"></textarea>
                        </div>
                    </div>

                    {{-- <div class="col-md-12">u
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
                                                    <input type="text" name="meal_name[]" value="{{ $day }}" class="form-control" readonly>
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
                    </div> --}}
                </div>
                <div class="col-md-12" style="text-align-last: right;">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('diet_charts.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
