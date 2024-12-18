<!-- Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('name', 'Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Key Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('key', 'Key:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('key', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<div class="form-group">
    <div class="row">
        <label class="col-md-3 col-lg-3 col-12 control-label">Permissions</label>
        <div class="col-md-9 col-lg-9 col-12" style="display: flex;flex-wrap: wrap;gap: 10px;">
            @php
                $permissions = DB::table('permissions')->get();
            @endphp
            @foreach($permissions as $permission)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check1" name="permissions[]" value="{{ $permission->id }}" {{in_array($permission->id, $permission_data) ? 'checked' : ''}} >
                <label class="form-check-label">{{ $permission->name }}</label>
            </div>
            @endforeach
        </div>
    </div>
</div>





<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('groups.index') }}" class="btn btn-danger">Cancel</a>
</div>
