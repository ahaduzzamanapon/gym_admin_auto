<tr>
    <th scopre="row">{!! Form::label('id', 'Id:') !!}</th>
    <td>{{ $expenses->id }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('title', 'Title:') !!}</th>
    <td>{{ $expenses->title }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('amount', 'Amount:') !!}</th>
    <td>{{ $expenses->amount }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('description', 'Description:') !!}</th>
    <td>{{ $expenses->description }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('created_at', 'Created At:') !!}</th>
    <td>{{ $expenses->created_at }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('updated_at', 'Updated At:') !!}</th>
    <td>{{ $expenses->updated_at }}</td>
</tr>


