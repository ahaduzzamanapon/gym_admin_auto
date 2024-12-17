<tr>
    <th scopre="row">{!! Form::label('id', 'Id:') !!}</th>
    <td>{{ $package->id }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('pack_name', 'Pack Name:') !!}</th>
    <td>{{ $package->pack_name }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('pack_admission_fee', 'Pack Admission Fee:') !!}</th>
    <td>{{ $package->pack_admission_fee }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('pack_duration', 'Pack Duration:') !!}</th>
    <td>{{ $package->pack_duration }}</td>
</tr>


<tr>     
    <th scope="row">{!! Form::label('pack_status', 'Pack Status:') !!}</th>     
    <td>
        @if ($package->pack_status == 1)
            Active
        @elseif ($package->pack_status == 2)
            Inactive
        @endif
    </td> 
</tr>



<tr>
    <th scopre="row">{!! Form::label('created_at', 'Created At:') !!}</th>
    <td>{{ $package->created_at }}</td>
</tr>


<tr>
    <th scopre="row">{!! Form::label('updated_at', 'Updated At:') !!}</th>
    <td>{{ $package->updated_at }}</td>
</tr>


