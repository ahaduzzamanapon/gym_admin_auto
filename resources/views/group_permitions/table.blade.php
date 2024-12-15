<div class="table-responsive">
    <table class="table" id="groupPermitions-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Group Id</th>
        <th>Permission Id</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($groupPermitions as $groupPermition)
            <tr>
                <td>{{ $groupPermition->id }}</td>
            <td>{{ $groupPermition->group_id }}</td>
            <td>{{ $groupPermition->permission_id }}</td>
            <td>{{ $groupPermition->created_at }}</td>
            <td>{{ $groupPermition->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['groupPermitions.destroy', $groupPermition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('groupPermitions.show', [$groupPermition->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('groupPermitions.edit', [$groupPermition->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
