<div class="table-responsive">
    <table class="table" id="multiBranches-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Branch Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Manager Name</th>
        <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($multiBranches as $key => $multiBranch)
            <tr>
                <td>{{ $key+1 }}</td>
            <td>{{ $multiBranch->branch_name }}</td>
            <td>{{ $multiBranch->address }}</td>
            <td>{{ $multiBranch->phone_number }}</td>
            <td>{{ $multiBranch->email }}</td>
            <td>{{ $multiBranch->manager_name }}</td>
           
                <td>
                    {!! Form::open(['route' => ['multiBranches.destroy', $multiBranch->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('multiBranches.show', [$multiBranch->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye" data-placement="top" title="View"></i></a>
                        <a href="{{ route('multiBranches.edit', [$multiBranch->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
