<!doctype html>
<html lang="en">
  <head>
    <title>{{$title}}</title>
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
                       <div style="text-align: right;color: white;">
                           <a onclick="print_w()" class="btn btn-primary">Print</a>
                       </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col"> Name</th>
                                <th scope="col"> Branch</th>
                                <th scope="col"> Amount</th>
                                <th scope="col"> Description</th>
                                <th scope="col"> Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total=0; @endphp
                            @if(isset($incomeData) && count($incomeData)>0)
                            @foreach ($incomeData as $key => $attendence)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $attendence->title }}</td>
                                    <td>{{ $attendence->branch_name }}</td>
                                    <td>{{ $attendence->amount }}</td>
                                    <td>{{ $attendence->description }}</td>
                                    <td>{{ $attendence->created_at }}</td>
                                </tr>
                                @php $total+=$attendence->amount; @endphp
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">No Data Found</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Total</td>
                                <td colspan="1">{{$total}}</td>
                            </tr>
                        </tfoot>
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
