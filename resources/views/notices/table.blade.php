<div class="table-responsive">
    <table class="table" id="notices-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($notices as $notice)
            <tr>
                <td>{{ $notice->id }}</td>
            <td>{{ $notice->title }}</td>
            <td>{{ $notice->description }}</td>
            <td>{{ $notice->created_at }}</td>
            <td>{{ $notice->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['notices.destroy', $notice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('notices.show', [$notice->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Information"></i></a>
                        <a href="{{ route('notices.edit', [$notice->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-File-Edit"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
