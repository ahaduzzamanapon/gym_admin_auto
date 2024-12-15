<div class="table-responsive">
    <table class="table" id="requisitions-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>Title</th>
        <th>Member name</th>
        <th>Product Id</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Updated At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requisitions as $requisition)
            <tr>
                <td>{{ $requisition->id }}</td>
            <td>{{ $requisition->Title }}</td>
            <td>{{ $requisition->member_name }}</td>
            <td>{{ $requisition->product_name }}</td>
            <td>
                <span class="badge @if($requisition->status==1) badge-warning @elseif($requisition->status==2) badge-success @elseif($requisition->status==3) badge-danger @else badge-secondary @endif">
                    {{ ($requisition->status==1?'Pending':($requisition->status==2?'Approved':($requisition->status==3?'Rejected':'null'))) }}
                </span>
            </td>
            <td>{{ $requisition->created_at }}</td>
            <td>{{ $requisition->updated_at }}</td>
                <td>
                    {!! Form::open(['route' => ['requisitions.destroy', $requisition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('requisitions.show', [$requisition->id]) }}" class='btn btn-outline-primary btn-xs'><i class="im im-icon-Eye"></i></a>
                        <a href="{{ route('requisitions.edit', [$requisition->id]) }}" class='btn btn-outline-primary btn-xs'><i
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
