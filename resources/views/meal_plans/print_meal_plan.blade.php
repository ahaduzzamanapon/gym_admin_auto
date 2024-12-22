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
                       <div class="title">Meal Plan</div>
                       <div style="text-align: right;color: white;">
                           <a onclick="print_w()" class="btn btn-primary">Print</a>
                       </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Meal Plan Name: <span>{{$mealPlan->meal_name}}</span></p>
                    <p>Description: <span>{{$mealPlan->description}}</span></p>
                </div>
                <div class="col-md-12">
                    {{-- @dd($foodplans) --}}
                    {{-- "id" => 1
                    "meal_plan_id" => 1
                    "meal_name" => "Sunday"
                    "meal_time" => "Breakfast"
                    "food_items" => "Sunday Breakfast"
                    "quantity" => "1"
                    "calories" => 231 --}}
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
