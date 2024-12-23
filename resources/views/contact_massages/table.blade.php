<div class="table-responsive">
    <table class="table" id="contactMassages-table">
        <thead>
            <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Phone</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contactMassages as $key => $contactMassage)
            <tr>
                <td>{{ $key+1 }}</td>
            <td>{{ $contactMassage->name }}</td>
            <td>{{ $contactMassage->email }}</td>
            <td>{{ $contactMassage->subject }}</td>
            <td>{{ $contactMassage->message }}</td>
            <td>{{ $contactMassage->phone }}</td>
            <td>{{ $contactMassage->created_at }}</td>
            <td>{{ $contactMassage->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['contactMassages.destroy', $contactMassage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('contactMassages.show', [$contactMassage->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                       
                        {!! Form::button('<i class="im im-icon-Remove" data-toggle="tooltip" data-placement="top" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
