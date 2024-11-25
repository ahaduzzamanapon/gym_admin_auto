<!-- Date Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('date', 'Date:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
        </div>
    </div>
</div>

{{-- @section('footer_scripts')
<script type="text/javascript">
    $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endsection --}}



@php
    $member_group_id=DB::table('groups')->where('key', 'member')->first()->id;
    $members=DB::table('members')->where('group_id', $member_group_id)->get();
    $staffMembers = DB::table('members')->where('group_id', '!=', $member_group_id)->get();
@endphp


<div class="col-12">

    <table class="table table-bordered">
        <thead>
            <tr><th>Member</th></tr>
            <tr>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->mem_name }}
                        <input type="hidden" name="member_id[]" value="{{ $member->id }}">
                        <input type="hidden" name="member_type[]" value="member">
                    </td>
                    <td>
                        <select name="status[]" class="form-control">
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </td>

                </tr>
            @endforeach
    </table>
    <table class="table table-bordered">
        <thead>
            <tr><th>Staff</th></tr>
            <tr>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffMembers as $staff)
                <tr>
                    <td>{{ $staff->mem_name }}
                        <input type="hidden" name="member_id[]" value="{{ $staff->id }}">
                        <input type="hidden" name="member_type[]" value="staff">
                    </td>
                    <td>
                        <select name="status[]" class="form-control">
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </td>

                </tr>
            @endforeach
    </table>
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('attendences.index') }}" class="btn btn-default">Cancel</a>
</div>
