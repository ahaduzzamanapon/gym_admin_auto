@php
$members = DB::table('members')
    ->join('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
    ->select('members.id', 'members.mem_name', 'multi_branchs.branch_name')
    ->when(!if_can('show_all_data'), function ($query) {
        $query->where('members.id', Auth::user()->member_id);
    })
    ->get()
    ->map(function ($member) {
        return [
            'id' => $member->id,
            'name' => $member->mem_name . '->' . $member->branch_name,
        ];
    })
    ->pluck('name', 'id');
@endphp


<!-- Member Id Field -->
<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('member_id', 'Member Id:', ['class' => 'control-label']) !!}
                {!! Form::select('member_id', $members->prepend('Select Member', ''), null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>
    
        <!-- Day Field -->
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('day', 'Day:', ['class' => 'control-label']) !!}
                {!! Form::text('day', null, ['class' => 'form-control', 'id' => 'day', 'required' => 'required']) !!}
            </div>
        </div>
        <!-- Day Field -->
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('Duration', 'Duration:', ['class' => 'control-label']) !!}
                {!! Form::text('duration', null, ['class' => 'form-control', 'id' => 'duration', 'required' => 'required']) !!}
            </div>
        </div>
    
        <!-- Workout Category Field -->
        {{-- <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('workout_category', 'Workout Category:', ['class' => 'control-label', 'required' => 'required']) !!}
            
               
            </div>
        </div> --}}
    </div>
</div>


<h3>Exercise</h3>

<table class="table table-bordered" id="myTable">
    <thead>
        <th>Category</th>
        <th>Exercise Name</th>
        <th>Reputation</th>
        <th>Sets</th>
        <th>Duration Minutes</th>
        <th><a class="btn btn-primary" onclick="addRow()">Add</a></th>
    </thead>
    <tbody>
        <tr>
            <td>
                <select name="workout_category[]" id="" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach ($workoutCategories as $workoutCategory)
                        <option value="{{ $workoutCategory->id }}">{{ $workoutCategory->title }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" name="exercise_name[]" class="form-control" required></td>
            <td><input type="text" name="reputation[]" class="form-control" required></td>
            <td><input type="text" name="sets[]" class="form-control" required></td>
            <td><input type="text" name="duration_minutes[]" class="form-control" required></td>
            <td>
                <a class="btn btn-danger" onclick="removeRow(this)">-</a>
            </td>
        </tr>
    </tbody>
</table>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dailyWorkouts.index') }}" class="btn btn-danger">Cancel</a>
</div>


<script>
    function addRow() {
        var table = document.getElementById("myTable");
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.innerHTML = `
            <select name='workout_category[]' id='' class='form-control' required>
                <option value=''>Select Category</option>
                @foreach ($workoutCategories as $workoutCategory)
                    <option value='{{ $workoutCategory->id }}'>{{ $workoutCategory->title }}</option>
                @endforeach
        </select>
        `;
        cell2.innerHTML = "<input type='text' name='exercise_name[]' class='form-control' required>";    
        cell3.innerHTML = "<input type='text' name='reputation[]' class='form-control' required>";    
        cell4.innerHTML = "<input type='text' name='sets[]' class='form-control' required>";    
        cell5.innerHTML = "<input type='text' name='duration_minutes[]' class='form-control' required>";    
        cell6.innerHTML = "<a class='btn btn-danger' onclick='removeRow(this)'>-</a>";
    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>
