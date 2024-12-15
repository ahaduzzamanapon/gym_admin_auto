<div class="table-responsive">
    <table class="table" id="workoutCategories-table">
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
        @foreach($workoutCategories as $key => $workoutCategory)
            <tr>
                <td>{{ $workoutCategory->id }}</td>
            <td>{{ $workoutCategory->title }}</td>
            <td>{{ $workoutCategory->created_at }}</td>
            <td>{{ $workoutCategory->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['workoutCategories.destroy', $workoutCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('workoutCategories.show', [$workoutCategory->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye"></i></a>
                        <a href="{{ route('workoutCategories.edit', [$workoutCategory->id]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-Pen"></i></a>
                        {!! Form::button('<i class="im im-icon-Remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
