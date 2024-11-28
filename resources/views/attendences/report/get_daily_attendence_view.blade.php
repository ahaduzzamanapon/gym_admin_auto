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
                       <div class="title">{{$title}}</div>
                       <div class="title">Date : {{$targetDate}}</div>
                       <div style="text-align: right;color: white;">
                           <a onclick="print_w()" class="btn btn-primary">Print</a>
                       </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"> Name</th>
                                <th scope="col"> In time</th>
                                <th scope="col"> Out time</th>
                                <th scope="col"> Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendences as $attendence)
                                <tr>
                                    <td>{{ $attendence->mem_name }}</td>
                                    <td>
                                        @if ($attendence->in_time!="" && $attendence->in_time!=null)
                                            {{ date('h:i A', strtotime($attendence->in_time)) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($attendence->out_time !="" && $attendence->out_time!=null)
                                            {{ date('h:i A', strtotime($attendence->out_time)) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $attendence->status }}</td>
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
