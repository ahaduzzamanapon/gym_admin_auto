<style>
    .pagination {
        justify-content: flex-end;
    }

    .dataTables_filter {
        text-align: -webkit-right;
    }

    .dataTables_filter label {
        display: flex;
        width: fit-content;
    }
</style>


<div class="table-responsive">
    <!-- Date Range Filter Form -->
    <div class="form-inline mb-3">
        <label for="from_date" class="mr-2">Date Range filter:</label>
        <input id="daterange" class="form-control" type="text" name="daterange" value="">
    </div>
    <table class="table" id="purchasePackages-table">
        <thead>
            <tr>
                <th>SL</th>
                <th>Member Name</th>
                <th>Package Name</th>
                <th>Expired Date</th>
                <th>Gross Amount</th>
                <th>Pay Amount</th>
                <th>Due Amount</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($purchasePackages as $key => $purchasePackage)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $purchasePackage->member_name }}</td>
                    <td>{{ $purchasePackage->pack_name }}</td>
                    <td style="white-space: nowrap">{{ date('Y-m-d', strtotime($purchasePackage->expired_date)) }}
                        @if ($purchasePackage->expired_date < date('Y-m-d'))
                        <div style="display: flex;align-items: center;">
                            <span class="badge badge-danger">Expired</span>
                            <a href="{{ route('purchasePackages.renew', [$purchasePackage->id]) }}" class="btn btn-primary">Renew</a>
                        </div>
                        @endif
                    </td>
                   
                    <td>{{ $purchasePackage->gross_amount }}</td>
                    <td>{{ $purchasePackage->pay_amount }}</td>
                    <td>{{ $purchasePackage->due_amount }}</td>
                    <td>
                        @if ($purchasePackage->status == 1)
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
                            {{-- <a href="{{ route('purchasePackages.show', [$purchasePackage->id]) }}"
                                class='btn btn-outline-primary btn-xs'>
                                <i class="im im-icon-Eye" data-placement="top" title="View"></i>
                            </a> --}}
                            <a href="{{ route('purchasePackages.edit', [$purchasePackage->id]) }}"
                                class='btn btn-outline-primary btn-xs'>
                                <i class="im im-icon-Pen" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                            </a>
                            {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-outline-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')",
                            ]) !!}
                            <a target="_blank" href="{{ route('purchasePackages.invoice', $purchasePackage->id) }}"
                                class="btn btn-success">Invoice</a>
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<!-- Include Moment.js -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<!-- Include Date Range Picker -->
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">

    <script>
        $(function() {
            let table = $('.table').DataTable({
            searching: true,
            paging: true,
            lengthChange: true,
            pageLength: 10,
            info: true,
            responsive: true,
            dom: 'lBfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
        table.search('').draw();
            // Date range vars
            minDateFilter = "";
            maxDateFilter = "";
            $("#daterange").daterangepicker();
            $("#daterange").on("apply.daterangepicker", function(ev, picker) {
                minDateFilter = Date.parse(picker.startDate);
                maxDateFilter = Date.parse(picker.endDate);

                $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                    var date = Date.parse(data[11]);
                    console.log(date);
                    

                    if (
                        (isNaN(minDateFilter) && isNaN(maxDateFilter)) ||
                        (isNaN(minDateFilter) && date <= maxDateFilter) ||
                        (minDateFilter <= date && isNaN(maxDateFilter)) ||
                        (minDateFilter <= date && date <= maxDateFilter)
                    ) {
                        return true;
                    }
                    return false;
                });
                table.draw();
            });


        });
    </script>
@endsection
