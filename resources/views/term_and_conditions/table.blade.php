<div class="table-responsive">
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
    <table class="table" id="termAndConditions-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($termAndConditions as $termAndCondition)
            <tr>
            <td>{{ $termAndCondition->id }}</td>
            <td>{{ $termAndCondition->title }}</td>
            <td>{{ $termAndCondition->created_at }}</td>
            <td>{{ $termAndCondition->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['termAndConditions.destroy', $termAndCondition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('termAndConditions.show', [$termAndCondition->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('termAndConditions.edit', [$termAndCondition->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"  data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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

