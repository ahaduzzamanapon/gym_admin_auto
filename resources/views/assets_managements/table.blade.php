<div class="table-responsive">
    <table class="table" id="assetsManagements-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Item Name</th>
                <th>Branch Name</th>
                <th>Category</th>
                <th>Asset For</th>
                <th>Item Description</th>
                <th>Location</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
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
            <td>{{ $assetsManagement->item_description }}</td>
            <td>{{ $assetsManagement->location }}</td>
            <td>{{ $assetsManagement->status }}</td>
            <td>{{ $assetsManagement->created_at }}</td>
            <td>{{ $assetsManagement->updated_at }}</td>
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
