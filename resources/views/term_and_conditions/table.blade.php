<div class="table-responsive">
    <table class="table" id="termAndConditions-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th colspan="3">Action</th>
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
