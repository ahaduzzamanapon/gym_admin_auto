<!-- Date Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('date', 'Date:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            <input type="text" name="date" class="form-control" id="date" value="{{ $date }}">
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
    // $member_group_id=DB::table('groups')->where('key', 'member')->first()->id;
    // $members=DB::table('members')->where('group_id', $member_group_id)->get();
    // $staffMembers = DB::table('members')->where('group_id', '!=', $member_group_id)->get();
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
                        <input type="hidden" name="member_id[]" value="{{ $member->member_id }}">
                        <input type="hidden" name="member_type[]" value="member">
                    </td>
                    <td>
                        <select name="status[]" class="form-control">
                            <option  {{ $member->status == 'Present' ? 'selected' : '' }} value="Present">Present</option>
                            <option  {{ $member->status == 'Absent' ? 'selected' : '' }} value="Absent">Absent</option>
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
            {{-- //@dd($staff->status); --}}
                <tr>
                    <td>{{ $staff->mem_name }}
                        <input type="hidden" name="member_id[]" value="{{ $staff->member_id }}">
                        <input type="hidden" name="member_type[]" value="staff">
                    </td>
                    <td>
                        <select name="status[]" class="form-control">
                            <option {{ $staff->status == 'Present' ? 'selected' : '' }}  value="Present">Present</option>
                            <option {{ $staff->status == 'Absent' ? 'selected' : '' }} value="Absent">Absent</option>
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
