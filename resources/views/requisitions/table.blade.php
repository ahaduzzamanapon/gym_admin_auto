<div >
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
    <table class="table" id="requisitions-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Member name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requisitions as $requisition)
                <tr>
                    <td>{{ $requisition->id }}</td>
                    <td>{{ $requisition->Title }}</td>
                    <td>{{ $requisition->member_name }}</td>
                    <td>{{ $requisition->product_name }}</td>
                    <td>{{ $requisition->qty }}</td>
                    <td>
                        <span
                            class="badge @if ($requisition->status == 1) badge-warning @elseif($requisition->status == 2) badge-success @elseif($requisition->status == 3) badge-danger @else badge-secondary @endif">
                            {{ $requisition->status == 1 ? 'Pending' : ($requisition->status == 2 ? 'Approved' : ($requisition->status == 3 ? 'Rejected' : ($requisition->status == 4 ? 'Delivered' : 'null'))) }}
                        </span>
                    </td>
                    <td>{{ date('d-m-Y', strtotime($requisition->created_at)) }}</td>
                    <td>
                        {!! Form::open(['route' => ['requisitions.destroy', $requisition->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('requisitions.show', [$requisition->id]) }}"
                                class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top"
                                    title="View"></i></a>
                            <a href="{{ route('requisitions.edit', [$requisition->id]) }}"
                                class='btn btn-outline-primary btn-xs'><i class="im im-icon-Pen" data-toggle="tooltip"
                                    data-placement="top" title="Edit"></i></a>
                            {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-outline-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')",
                            ]) !!}
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
        let table = $('.table').DataTable({
            searching: true,
            paging: true,
            lengthChange: true,
            pageLength: 10,
            info: true,
            responsive: true,
            export: true,
        });
        table.search('').draw();
    });
</script>
@endsection
