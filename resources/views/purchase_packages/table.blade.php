<div class="table-responsive">
    <!-- Date Range Filter Form -->
    {{-- <div class="form-inline mb-3">
        <label for="from_date" class="mr-2">From:</label>
        <input type="date" id="from_date" class="form-control mr-3">
        <label for="to_date" class="mr-2">To:</label>
        <input type="date" id="to_date" class="form-control mr-3">
        <button id="filterDate" class="btn btn-primary">Filter</button>
    </div> --}}
    
    <table class="table" id="purchasePackages-table">
        <thead>
            <tr>
                <th>SL</th>
                <th>Member Name</th>
                <th>Package Name</th>
                <th>Coupon Code</th>
                <th>Amount</th>
                <th>Vat</th>
                <th>Coupon Amount</th>
                <th>Gross Amount</th>
                <th>Pay Amount</th>
                <th>Due Amount</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchasePackages as $key => $purchasePackage)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $purchasePackage->member_name }}</td>
                    <td>{{ $purchasePackage->pack_name }}</td>
                    <td>{{ $purchasePackage->coupons_id }}</td>
                    <td>{{ $purchasePackage->amount }}</td>
                    <td>{{ $purchasePackage->tax }}</td>
                    <td>{{ $purchasePackage->coupon_amount }}</td>
                    <td>{{ $purchasePackage->gross_amount }}</td>
                    <td>{{ $purchasePackage->pay_amount }}</td>
                    <td>{{ $purchasePackage->due_amount }}</td>
                    <td>
                        @if($purchasePackage->status == 1)
                            <span class="badge badge-warning">Pending</span>
                        @elseif($purchasePackage->status == 2)
                            <span class="badge badge-danger">Due</span>
                        @elseif($purchasePackage->status == 3)
                            <span class="badge badge-success">Fully Paid</span>
                        @endif
                    </td>
                    <td>{{ date('Y-m-d', strtotime($purchasePackage->created_at)) }}</td>
                    <td>
                        {!! Form::open(['route' => ['purchasePackages.destroy', $purchasePackage->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('purchasePackages.show', [$purchasePackage->id]) }}" class='btn btn-outline-primary btn-xs'>
                                    <i class="im im-icon-Eye" data-placement="top" title="View"></i>
                                </a>
                                <a href="{{ route('purchasePackages.edit', [$purchasePackage->id]) }}" class='btn btn-outline-primary btn-xs'>
                                    <i class="im im-icon-Pen" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                </a>
                                {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', [
                                    'type' => 'submit', 
                                    'class' => 'btn btn-outline-danger btn-xs', 
                                    'onclick' => "return confirm('Are you sure?')"
                                ]) !!}
                                <a target="_blank" href="{{ route('purchasePackages.invoice', $purchasePackage->id) }}" class="btn btn-success">Invoice</a>
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@section('footer_scripts')
    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
$(document).ready(function() {
    let table = $('#purchasePackages-table').DataTable({
        searching: true,
        paging: true,
        pageLength: 10,
        info: true,
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy',  'excel', 'pdf', 'print'
        ],
        language: {
            search: "Filter records:",
            paginate: {
                previous: "Previous",
                next: "Next"
            }
        }
    });

    $('#filterDate').on('click', function() {
        let fromDate = $('#from_date').val().trim();
        let toDate = $('#to_date').val().trim();

        console.log('From Date:', fromDate);
        console.log('To Date:', toDate);

        if (fromDate && toDate) {
            table.columns(11)  // Column index 11 for 'Created At'
                .search(`^${fromDate}.*${toDate}$`, true, false)
                .draw();
            console.log('Applied Date Filter:', `^${fromDate}.*${toDate}$`);
        } else {
            table.columns(11).search('').draw();  // Clear filter if dates are empty
        }
    });
});





  


    </script>
@endsection
