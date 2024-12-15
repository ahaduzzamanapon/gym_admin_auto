<div class="table-responsive">
    <table class="table" id="dailyWorkouts-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Member Id</th>
        <th>Day</th>
        <th>Workout Category</th>
        <th>Exercise Name</th>
        <th>Reputation</th>
        <th>Sets</th>
        <th>Duration Minutes</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dailyWorkouts as $key => $dailyWorkouts)
            <tr>
                <td>{{ $dailyWorkouts->id }}</td>
            <td>{{ $dailyWorkouts->member_id }}</td>
            <td>{{ $dailyWorkouts->day }}</td>
            <td>{{ $dailyWorkouts->workout_category }}</td>
            <td>{{ $dailyWorkouts->exercise_name }}</td>
            <td>{{ $dailyWorkouts->reputation }}</td>
            <td>{{ $dailyWorkouts->sets }}</td>
            <td>{{ $dailyWorkouts->duration_minutes }}</td>
            <td>{{ $dailyWorkouts->created_at }}</td>
            <td>{{ $dailyWorkouts->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['dailyWorkouts.destroy', $dailyWorkouts->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dailyWorkouts.show', [$dailyWorkouts->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye"></i></a>
                        <a href="{{ route('dailyWorkouts.edit', [$dailyWorkouts->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
