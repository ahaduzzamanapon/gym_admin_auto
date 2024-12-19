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
    <table class="table" id="assetsManagements-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Item Name</th>
                <th>Branch Name</th>
                <th>Category</th>
                <th>Asset For</th>
                <th>Item Quantity</th>
                <th>Item Description</th>
                <th>Location</th>
                <th>Status</th>
            
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($assetsManagements as $assetsManagement)
            <tr>
                <td>{{ $assetsManagement->id }}</td>
            <td>{{ $assetsManagement->item_name }}</td>
            <td>{{ $assetsManagement->branch_name }}</td>
            <td>{{ $assetsManagement->assets_category_name }}</td>
            <td>{{ $assetsManagement->asset_for }}</td>
            <td>{{ $assetsManagement->item_quantity }}</td>
            <td>{{ $assetsManagement->item_description }}</td>
            <td>{{ $assetsManagement->location }}</td>
            <td>{{ $assetsManagement->status }}</td>
          
                <td>
                    {!! Form::open(['route' => ['assetsManagements.destroy', $assetsManagement->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('assetsManagements.show', [$assetsManagement->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('assetsManagements.edit', [$assetsManagement->id]) }}" class='btn btn-outline-primary btn-xs'><i
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>


<script>
    $(document).ready(function() {
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
    });
</script>
@endsection
