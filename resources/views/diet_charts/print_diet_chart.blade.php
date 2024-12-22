<!doctype html>
<html lang="en">
  <head>
    <title>Meal Plan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .title{
            display: flex;
            flex-direction: column;
            align-items: center;
        } 
        @media print {
            .btn{
                display: none;
            }
        }   
    </style>
</head>
  <body>
    
      <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                       @include('reports_header')
                       <div class="title">Diet Chart</div>
                       <div style="text-align: right;color: white;">
                           <a onclick="print_w()" class="btn btn-primary">Print</a>
                       </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5>Member Details</h5>
                    <div style="display: flex;flex-wrap: wrap;">
                        <p style="width: 25%;">Member Name: <span>{{$dietChart->member_name}}</span></p>
                        <p style="width: 25%;">Age: <span>{{$dietChart->age}}</span></p>
                        <p style="width: 25%;">Gender: <span>{{$dietChart->gender}}</span></p>
                        <p style="width: 25%;">Height: <span>{{$dietChart->height}}</span></p>
                        <p style="width: 25%;">Weight: <span>{{$dietChart->weight}}</span></p>
                        <p style="width: 25%;">Body Fat Percentage: <span>{{$dietChart->body_fat_percentage}}</span></p>
                        <p style="width: 25%;">Goal: <span>{{$dietChart->goal}}</span></p>
                        <p style="width: 25%;">Meal Preference: <span>{{$dietChart->meal_preference}}</span></p>
                        <p style="width: 25%;">Caloric Requirement: <span>{{$dietChart->caloric_requirement}}</span></p>
                        <p style="width: 25%;">Protein (grams): <span>{{$dietChart->protein_grams}}</span></p>
                        <p style="width: 25%;">Carbohydrates (grams): <span>{{$dietChart->carbs_grams}}</span></p>
                        <p style="width: 25%;">Fats (grams): <span>{{$dietChart->fats_grams}}</span></p>
                        <p style="width: 25%;">Water Intake (liters): <span>{{$dietChart->water_intake}}</span></p>
                        <p style="width: 25%;">Special Instructions: <span>{{$dietChart->special_instructions}}</span></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <h5>Meal Plan</h5>
                    <p>Meal Plan Name: <span>{{$mealPlan->meal_name}}</span></p>
                    <p>Description: <span>{{$mealPlan->description}}</span></p>
                </div>
                <div class="col-md-12">
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Meal Time</th>
                                <th scope="col">Food Items</th>
                                <th scope="col">Calories</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $day='';
                                $key=0;
                            @endphp
                            @foreach ($foodplans as $foodplan)
                                @php
                                    $key++;
                                    if($day != $foodplan->meal_name){
                                        echo '<tr style="text-align-last: center;"><td colspan="4"><b>'.$foodplan->meal_name.'</b></td></tr>';
                                        $day = $foodplan->meal_name;
                                        $key=1;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $foodplan->meal_time }}</td>
                                    <td>{{ $foodplan->food_items }}</td>
                                    <td>{{ $foodplan->calories }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                 
                    </table>
                </div>
            </div>
      </div>
    <script type="text/javascript">
        function print_w() {
            console.log("print");
            window.print();
        }
        setTimeout(() => {
            window.stop();
        }, 500);
    </script>
</body>
</html>
