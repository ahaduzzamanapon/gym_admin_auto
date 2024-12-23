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
                    @include('componant.member_select')
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" id='age'  required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male" >Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input type="number" id="height" name="height" class="form-control"  step="0.01" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Weight (kg)</label>
                            <input type="number" id="weight" name="weight" class="form-control"  step="0.01" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Body Fat Percentage (%)</label>
                            <input type="number" id="body_fat_percentage" name="body_fat_percentage" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Target</label>
                            <select name="goal" id="goal" class="form-control" required>
                                <option value="" >Select Target</option>
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
                            <select name="meal_preference" id class="form-control" required>
                                <option value="" >Select Meal Preference</option>

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
                            <input type="number" id="caloric_requirement" name="caloric_requirement" class="form-control"  required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Protein (grams)</label>
                            <input type="number" id="protein_grams" name="protein_grams" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Carbohydrates (grams)</label>
                            <input type="number" id="carbs_grams" name="carbs_grams" class="form-control"  step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fats (grams)</label>
                            <input type="number" id name="fats_grams" class="form-control" step="0.01">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Water Intake (liters)</label>
                            <input type="number" id="water_intake" name="water_intake" class="form-control" step="0.01">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Meal Plan</label>
                            <select name="meal_plan_id" id="meal_plan_id" class="form-control" required>

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
                            <input type="date" id="date" name="from_date" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>To date</label>
                            <input type="date" name="to_date" id="to_date" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Special Instructions</label>
                            <textarea name="special_instructions" id="special_instructions" class="form-control"></textarea>
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
                <div class="col-md-12" style="">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('diet_charts.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $('#member_name').change(function() {
        user_id =$(this).val().split(',');
        $.ajax({
            url: "{{ route('diet_charts.get_data_by_user_id') }}",
            type: "POST",
            data: {
                '_token': '{{ csrf_token() }}',
                'user_id': user_id[1],
            },
            success: function(data) {
                data.forEach(element => {
                    memberAge = calculateAge(element.date_of_birth);
                    $('#age').val(memberAge);
                    $('#gender').val(element.mem_gender);
                    $('#height').val(element.height);
                    $('#weight').val(element.weight);

                })
            }
        });

    });



    function calculateAge(birthDate) {
         // Convert the birthDate to a JavaScript Date object
        const birth = new Date(birthDate);
        
        // Get the current date
        const today = new Date();
        
        // Calculate the age difference in years
        let age = today.getFullYear() - birth.getFullYear();
        
        // Adjust if the birthday hasn't occurred yet this year
        const monthDifference = today.getMonth() - birth.getMonth();
        const dayDifference = today.getDate() - birth.getDate();
        if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
            age--;
        }
        
        return age;
    }



</script>


@endsection
