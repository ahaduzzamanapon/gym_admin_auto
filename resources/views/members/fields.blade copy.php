<!-- Mem Name Field -->
<div class="form-group">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12">
            <label for="mem_name" class="control-label">
                Member Name: <span class="text-danger">*</span>
            </label>
        </div>
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Member Name']) !!}
            @error('mem_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12">
            <label for="mem_name" class="control-label">
                Member id: <span class="text-danger">*</span>
            </label>
        </div>
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('member_unique_id', null, ['class' => 'form-control', 'placeholder' => 'Enter Member Name']) !!}
            @error('member_unique_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Mem Father Field -->
<div class="form-group">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12">
            <label for="mem_father" class="control-label">
                Member Father:
            </label>
        </div>
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_father', null, ['class' => 'form-control', 'placeholder' => 'Enter Member Father Name']) !!}
            @error('mem_father')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Mem Mother Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_mother', 'Member Mother:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_mother', null, ['class' => 'form-control', 'placeholder' => 'Enter Member Mother Name']) !!}
            @error('mem_mother')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<!-- Mem Gender Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('gender', 'Gender:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            <div class="form-check form-check-inline">
                {!! Form::radio('mem_gender', 'Male', false, ['class' => 'form-check-input', 'id' => 'genderMale']) !!}
                {!! Form::label('genderMale', 'Male', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline">
                {!! Form::radio('mem_gender', 'Female', false, ['class' => 'form-check-input', 'id' => 'genderFemale']) !!}
                {!! Form::label('genderFemale', 'Female', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline">
                {!! Form::radio('mem_gender', 'other', false, ['class' => 'form-check-input', 'id' => 'genderOther']) !!}
                {!! Form::label('genderOther', 'Other', ['class' => 'form-check-label']) !!}
            </div>
            @error('mem_gender')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Mem Address Field -->
<div class="form-group">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12">
            <label for="mem_address" class="control-label">
                Member Address: <span class="text-danger">*</span>
            </label>
        </div>
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_address', null, ['class' => 'form-control', 'placeholder' => 'Enter Member Address']) !!}
            @error('mem_address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Mem Admission Date Field -->
<div class="form-group">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12">
            <label for="mem_admission_date" class="control-label">
                Member Admission Date: <span class="text-danger">*</span>
            </label>
        </div>
        <div class="col-md-3 col-lg-3 col-12">
            {!! Form::date('mem_admission_date', isset($member) && $member->mem_admission_date ? date('Y-m-d', strtotime($member->mem_admission_date)) : null, ['class' => 'form-control', 'id' => 'mem_admission_date']) !!}
            @error('mem_admission_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Mem Cell Field -->
<div class="form-group">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12">
            <label for="mem_cell" class="control-label">
                Member Cell: <span class="text-danger">*</span>
            </label>
        </div>
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_cell', null, ['class' => 'form-control', 'placeholder' => 'Enter Member Cell']) !!}
            @error('mem_cell')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Mem Email Field -->
<div class="form-group">
    <div class="row">
        <div class="col-md-3 col-lg-3 col-12">
            <label for="mem_email" class="control-label">
                Member Email: <span class="text-danger">*</span>
            </label>
        </div>
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::email('mem_email', null, ['class' => 'form-control', 'placeholder' => 'Enter Member Email']) !!}
            @error('mem_email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Mem Type Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_type', 'Member Type:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('mem_type', ['member' => 'Member', 'staff' => 'Staff'], null, ['class' => 'form-control']) !!}
            @error('mem_type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Mem punch id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('punch_id', 'Member Punch Id:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('punch_id', null, ['class' => 'form-control','placeholder' => 'Enter Member Punch Id']) !!}
        </div>
    </div>
</div>
<!-- Mem Img Url Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_img_url', 'Member Img Url:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::file('mem_img_url', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

@php
$groups = DB::table('groups')->get();
$multi_branchs = DB::table('multi_branchs')->get();
// dd($member);
@endphp

<!-- group Img Url Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('group_id', 'Group:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('group_id', $groups->pluck('name', 'id')->prepend('Select Group', ''), null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<!-- group Img Url Field -->
<div class="form-group">
    <div class="row">
        <label for="branch_id" class="control-label col-md-3 col-lg-3 col-12">
            Branch: <span class="text-danger">*</span>
        </label>       
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('branch_id', $multi_branchs->pluck('branch_name', 'id')->prepend('Select Branch', ''), null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>

<!-- Submit and Cancel Buttons -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('members.index') }}" class="btn btn-danger">Cancel</a>
</div>

