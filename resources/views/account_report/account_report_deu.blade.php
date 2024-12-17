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
                            <th scope="col">Name</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Package</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Pay Amount</th>
                            <th scope="col">Due Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total=0; $total_pay=0; $total_due=0 @endphp
                        @if(isset($purchasePackages) && count($purchasePackages)>0)
                        @foreach ($purchasePackages as $key => $purchase)
                        @php $total=$total+$purchase->amount; $total_pay+=$purchase->pay_amount; $total_due+=$purchase->due_amount; @endphp
                        {{-- "id" => 9
                        "member_id" => 3
                        "package_id" => 1
                        "coupons_id" => null
                        "amount" => 600
                        "tax" => 0
                        "coupon_amount" => 0
                        "gross_amount" => 600
                        "pay_amount" => 300
                        "due_amount" => 300
                        "status" => 2
                        "created_at" => "2024-12-15 06:54:53"
                        "updated_at" => "2024-12-15 06:54:53"
                        "pack_name" => "3 month"
                        "member_name" => "Md Imdadul"
                        "branch_name" => "Male Branch" --}}
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $purchase->member_name }}</td>
                                <td>{{ $purchase->branch_name }}</td>
                                <td>{{ $purchase->pack_name }}</td>
                                <td>{{ $purchase->amount }}</td>
                                <td>{{ $purchase->pay_amount }}</td>
                                <td>{{ $purchase->due_amount }}</td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">No Data Found</td>
                        </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr class="total bg-gray">
                            <td colspan="4">Total</td>
                            <td colspan="1">{{$total}}</td>
                            <td colspan="1">{{$total_pay}}</td>
                            <td colspan="1">{{$total_due}}</td>
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
