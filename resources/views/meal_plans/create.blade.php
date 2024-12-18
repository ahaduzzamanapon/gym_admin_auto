@extends('layouts.default')

{{-- Page title --}}
@section('title')
Add Meal Chart @parent
@stop

@section('content')
<style>
    .meal-time-row {
      display: none; /* Hide meal-time rows initially */
    }
    .expandable-day {
      cursor: pointer;
  }
    .rotate {
        transform: rotate(90deg); /* Rotate the arrow icon */
        transition: transform 0.3s ease-in-out; /* Smooth transition */
    }
</style>
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
                            <label>Meal Plan</label>
                            <input type="text" name="meal_name" class="form-control" placeholder="Enter Meal Name">
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
                                    <th>Meal Time</th>
                                    <th>Food Items</th>
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
                                    <tr class="expandable-day">
                                      <td colspan="4" class="font-weight-bold">
                                        {{ $day }} <span class="navigation"><i class="im im-icon-Arrow-Forward2 fs-20"></i></span>
                                      </td>
                                    </tr>
                                    <!-- Meal Time Rows -->
                                    @foreach ($meal_time as $time)
                                      <tr class="meal-time-row">

                                        <td>
                                          <div class="form-group">
                                            <input type="hidden" name="meal_name_f[]" value="{{ $day }}" class="form-control" readonly>
                                            <input type="text" name="meal_time[]" value="{{ $time }}" class="form-control" readonly>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="form-group">
                                            <input type="text" name="food_items[]" value="{{ $day }} {{ $time }}" class="form-control" placeholder="Enter food items">
                                            <input type="hidden" name="quantity[]" value="{{rand(1, 5)}}" class="form-control" placeholder="Enter quantity">
                                          </div>
                                        </td>
                                        
                                        <td>
                                          <div class="form-group">
                                            <input type="number" name="calories[]" value="{{rand(100, 500)}}" class="form-control" placeholder="Enter calories">
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
                <div class="col-md-12" style="">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('meal_plans.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
      $('.expandable-day').on('click', function() {
        $(this).nextUntil('.expandable-day').toggle();
        var arrowIcon = $(this).find('.navigation i');
        if (arrowIcon.hasClass('im-icon-Arrow-Forward2')) {
            arrowIcon.removeClass('im-icon-Arrow-Forward2').addClass('im-icon-Arrow-Down2').toggleClass('rotate');
        } else {
            arrowIcon.removeClass('im-icon-Arrow-Down2').addClass('im-icon-Arrow-Forward2').toggleClass('rotate');
        }
      });
    });
</script>
@endsection
