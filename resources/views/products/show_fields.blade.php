<tr>
    <th scopre="row">{!! Form::label('id', 'Id:') !!}</th>
    <td>{{ $product->id }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('product_name', 'Product Name:') !!}</th>
    <td>{{ $product->product_name }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('product_price', 'Product Price:') !!}</th>
    <td>{{ $product->product_price }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('product_qty', 'Product Qty:') !!}</th>
    <td>{{ $product->product_qty }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('product_img_url', 'Product Img Url:') !!}</th>
    <td>{{ $product->product_img_url }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('created_at', 'Created At:') !!}</th>
    <td>{{ $product->created_at }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('updated_at', 'Updated At:') !!}</th>
    <td>{{ $product->updated_at }}</td>
</tr>


