@extends('layouts.default')

{{-- Page title --}}
@section('title')
Edit Diet Chart @parent
@stop

@section('content')
<section class="content-header">
    <div aria-label="breadcrumb" class="card-breadcrumb">
        <h1>Edit Diet Chart</h1>
    </div>
    <div class="separator-breadcrumb border-top"></div>
</section>

<div class="content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('diet_charts.update', $dietChart->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Member Name</label>
                            <select name="member_name" class="form-control" id="member_name">
                                @php
                                    $members = DB::table('members')->get();
                                @endphp
                                @foreach ($members as $member)
                                    <option {{ $member->id == $dietChart->member_id ? 'selected' : ''}} value="{{ $member->mem_name }},{{ $member->id }}">{{ $member->mem_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control"  value="{{ $dietChart->age }}"  required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>
                                <option {{ $dietChart->gender == 'Male' ? 'selected' : ''}} value="Male" >Male</option>
                                <option {{ $dietChart->gender == 'Female' ? 'selected' : ''}} value="Female">Female</option>
                                <option {{ $dietChart->gender == 'Other' ? 'selected' : ''}} value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input value="{{ $dietChart->height }}" type="number" name="height" class="form-control"  step="0.01" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Weight (kg)</label>
                            <input value="{{ $dietChart->weight }}" type="number" name="weight" class="form-control"  step="0.01" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Body Fat Percentage (%)</label>
                            <input value="{{ $dietChart->body_fat_percentage }}" type="number" name="body_fat_percentage" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Target</label>
                            <select name="goal" class="form-control" required>
                                <option {{ $dietChart->goal == 'Weight Loss' ? 'selected' : ''}} value="Weight Loss">Weight Loss</option>
                                <option {{ $dietChart->goal == 'Muscle Gain' ? 'selected' : ''}} value="Muscle Gain">Muscle Gain</option>
                                <option  {{ $dietChart->goal == 'Maintenance' ? 'selected' : ''}} value="Maintenance">Maintenance</option>
                                <option {{ $dietChart->goal == 'Other' ? 'selected' : ''}} value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Meal Preference</label>
                            <select name="meal_preference" class="form-control" required>
                                <option {{ $dietChart->meal_preference == 'Vegetarian' ? 'selected' : ''}} value="Vegetarian" >Vegetarian</option>
                                <option {{ $dietChart->meal_preference == 'Non-Vegetarian' ? 'selected' : ''}} value="Non-Vegetarian" >Non-Vegetarian</option>
                                <option {{ $dietChart->meal_preference == 'Vegan' ? 'selected' : ''}} value="Vegan" >Vegan</option>
                                <option {{ $dietChart->meal_preference == 'Pescatarian' ? 'selected' : ''}} value="Pescatarian" >Pescatarian</option>
                                <option {{ $dietChart->meal_preference == 'Other' ? 'selected' : ''}} value="Other" >Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Caloric Requirement (kcal)</label>
                            <input value="{{ $dietChart->caloric_requirement }}" type="number" name="caloric_requirement" class="form-control"  required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Protein (grams)</label>
                            <input value="{{ $dietChart->protein_grams }}" type="number" name="protein_grams" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Carbohydrates (grams)</label>
                            <input value="{{ $dietChart->carbs_grams }}" type="number" name="carbs_grams" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fats (grams)</label>
                            <input value="{{ $dietChart->fats_grams }}" type="number" name="fats_grams" class="form-control" step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Water Intake (liters)</label>
                            <input value="{{ $dietChart->water_intake }}" type="number" name="water_intake" class="form-control" step="0.01">
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
                                    <option {{ $dietChart->meal_plan_id == $meal_plan->id ? 'selected' : ''}} value="{{ $meal_plan->id }}">{{ $meal_plan->meal_name }}</option>
                                @endforeach
                               
                            </select>
                           
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>From date</label>
                            <input type="date" value="{{ $dietChart->from_date }}" name="from_date" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>To date</label>
                            <input type="date" value="{{ $dietChart->to_date }}" name="to_date" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Special Instructions</label>
                            <textarea name="special_instructions" class="form-control"> {{ $dietChart->special_instructions }}</textarea>
                        </div>
                    </div>

                    {{-- <div class="col-md-12">
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
                                                    <input type="text" name="meal_name[]" value="{{$mealplans[$sl]->meal_name}}" class="form-control" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="meal_time[]" value="{{ $mealplans[$sl]->meal_time }}" class="form-control" readonly>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="food_items[]" value="{{ $mealplans[$sl]->food_items }}" class="form-control" placeholder="Enter food items">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="quantity[]" value="{{ $mealplans[$sl]->quantity }}" class="form-control" placeholder="Enter quantity">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="number" name="calories[]" value="{{ $mealplans[$sl]->calories }}" class="form-control" placeholder="Enter calories">
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
                    </div> --}}
                </div>
                <div class="col-md-12" style="text-align-last: right;">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('diet_charts.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
