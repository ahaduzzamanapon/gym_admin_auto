<tr>
    <th scopre="row">{!! Form::label('id', 'Id:') !!}</th>
    <td>{{ $coupon->id }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('title', 'Title:') !!}</th>
    <td>{{ $coupon->title }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('coupon_code', 'Coupon Code:') !!}</th>
    <td>{{ $coupon->coupon_code }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('expire_date', 'Expire Date:') !!}</th>
    <td>{{ $coupon->expire_date }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('amount', 'Amount:') !!}</th>
    <td>{{ $coupon->amount }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('note', 'Note:') !!}</th>
    <td>{{ $coupon->note }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('created_at', 'Created At:') !!}</th>
    <td>{{ $coupon->created_at }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('updated_at', 'Updated At:') !!}</th>
    <td>{{ $coupon->updated_at }}</td>
</tr>


