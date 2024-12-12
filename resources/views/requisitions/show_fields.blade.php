<tr>
    <th scopre="row">{!! Form::label('id', 'Id:') !!}</th>
    <td>{{ $requisition->id }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('Title', 'Title:') !!}</th>
    <td>{{ $requisition->Title }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('member_id', 'Member name:') !!}</th>
    <td>{{ $requisition->member_name }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('product_id', 'Product Name:') !!}</th>
    <td>{{ $requisition->product_name }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('status', 'Status:') !!}</th>
    <td><span class="badge @if($requisition->status==1) badge-warning @elseif($requisition->status==2) badge-success @elseif($requisition->status==3) badge-danger @else badge-secondary @endif">
        {{ ($requisition->status==1?'Pending':($requisition->status==2?'Approved':($requisition->status==3?'Rejected':'null'))) }}
    </span></td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('created_at', 'Created At:') !!}</th>
    <td>{{ $requisition->created_at }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('updated_at', 'Updated At:') !!}</th>
    <td>{{ $requisition->updated_at }}</td>
</tr>


