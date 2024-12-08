<tr>
    <th scopre="row">{!! Form::label('id', 'Id:') !!}</th>
    <td>{{ $schedulebooking->id }}</td>
</tr>

{{-- @dd($schedulebooking); --}}

<tr>
    <th scopre="row">{!! Form::label('member_id', 'Member name:') !!}</th>
    <td>{{ $schedulebooking->mem_name }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('booking_date', 'Booking Date:') !!}</th>
    <td>{{ $schedulebooking->booking_date }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('service_type', 'Service Type:') !!}</th>
    <td>{{ $schedulebooking->service_type }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('status', 'Status:') !!}</th>
    <td>{{ $schedulebooking->status }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('note', 'Note:') !!}</th>
    <td>{{ $schedulebooking->note }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('created_at', 'Created At:') !!}</th>
    <td>{{ $schedulebooking->created_at }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('updated_at', 'Updated At:') !!}</th>
    <td>{{ $schedulebooking->updated_at }}</td>
</tr>


