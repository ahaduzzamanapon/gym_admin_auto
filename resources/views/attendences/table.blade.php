<div class="table-responsive">
    <table class="table" id="attendences-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Date</th>
        <th>Member Present</th>
        <th>Member Absent</th>
        <th>Staff Present</th>
        <th>Staff Absent</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($attendences as $key => $attendence)
            <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $attendence->date }}</td>
            <td>{{ $attendence->present_members }}</td>
            <td>{{ $attendence->present_staff }}</td>
            <td>{{ $attendence->absent_members }}</td>
            <td>{{ $attendence->absent_staff }}</td>
                <td>
                    <div class='btn-group'>
                        <a href="{{ route('attendences.show', [$attendence->date]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Information"></i></a>
                        <a href="{{ route('attendences.edit', [$attendence->date]) }}" class='btn btn-outline-primary btn-xs'><i
                                class="im im-icon-File-Edit"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
