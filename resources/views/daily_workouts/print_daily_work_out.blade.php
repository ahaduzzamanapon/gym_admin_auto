<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    body{

    }
    .daily_workouts_box {
      width: 510px;
      height: 750px;
      border: 1px solid #000;
      padding: 5px;
    }
    td, th {
      padding: 1px!important;
    }
  </style>
  </head>
  <body>
    <div style="display: flex;flex-wrap: wrap;">
        @php
        $mot=0;
        @endphp
        @foreach($ids as $id)
        @php
        $mot+=1;
        $dailyWorkoutsdetails = DB::table('daily_work_out_details')->where('id', $id)->first();
        $member_details = DB::table('members')->where('id', $dailyWorkoutsdetails->member_id)->first();
        $dailyWorkouts = DB::table('daily_workouts')
                           ->join('workout_categorys', 'daily_workouts.workout_category', '=', 'workout_categorys.id')
                           ->where('daily_work_out_details_id', $dailyWorkoutsdetails->id)
                           ->orderBy('workout_categorys.id', 'asc')
                           ->get()
                           ->all();
        @endphp
        <div class="daily_workouts_box">
            @include('reports_header')
            <div style="width: 100%;display: flex;flex-direction: row;">
                <div style="width: 100%;display: flex;line-height: 5px;flex-direction: column;">
                    <p>Name: {{ $member_details->mem_name }}</p>
                    <p>Age: {{ \Carbon\Carbon::parse($member_details->date_of_birth)->age }}</p>
                    <p>Sex: {{$member_details->mem_gender}}</p>
                </div>
                <div style="width: 100%;display: flex;line-height: 5px;flex-direction: column;">
                    <p>Date: {{ $dailyWorkoutsdetails->created_at }}</p>
                    <p>Duration: {{ $dailyWorkoutsdetails->duration }}</p>
                    <p>Day: {{ $dailyWorkoutsdetails->day }}</p>
                </div>
            </div>
            <div style="width: 100%;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Exercise Name</th>
                            <th>Reputaion</th>
                            <th>Sets</th>
                            <th>Duration Minutes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $cat="";
                        @endphp
                        @foreach($dailyWorkouts as $row)
                        @if($cat!=$row->title)
                        <tr>
                            <td colspan="4" style="background-color: #f2f2f2;">{{ $row->title }}</td>
                        </tr>
                        @endif
                        @php
                        $cat=$row->title;
                        @endphp
                        <tr>
                            <td>{{ $row->exercise_name }}</td>
                            <td>{{ $row->reputation }}</td>
                            <td>{{ $row->sets }}</td>
                            <td>{{ $row->duration_minutes }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            @if($mot==4)
            <div style="page-break-after: always;"></div>
                @php
                $mot=0;
                @endphp
            @endif
        @endforEach
    </div>
    <script>
        window.print();
    </script>
  </body>
</html>