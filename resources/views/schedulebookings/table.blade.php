<div class="table-responsive">
    <table class="table" id="schedulebookings-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Member name</th>
        <th>Booking Date</th>
        <th>Booking time</th>
        <th>Service Type</th>
        <th>Status</th>
        <th>Note</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($schedulebookings as $schedulebooking)
            <tr>
                <td>{{ $schedulebooking->id }}</td>
            <td>{{ $schedulebooking->mem_name}}</td>
            <td>{{ date('Y-m-d', strtotime($schedulebooking->booking_date)) }}</td>
            <td>{{ $schedulebooking->booking_time }}</td>
            <td>{{ $schedulebooking->service_type }}</td>
            <td>
                @if($schedulebooking->status == 2)
                    <button class="btn btn-primary">Active</button>
                @else
                    <span class="btn btn-danger">Inactive</span>
                @endif
            </td>
            <td>{{ $schedulebooking->note }}</td>
            <td>{{ $schedulebooking->created_at }}</td>
            <td>{{ $schedulebooking->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['schedulebookings.destroy', $schedulebooking->schedulebooking_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('schedulebookings.show', [$schedulebooking->schedulebooking_id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye"></i></a>
                        <a href="{{ route('schedulebookings.edit', [$schedulebooking->schedulebooking_id]) }}" class='btn btn-outline-primary btn-xs'><i
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
