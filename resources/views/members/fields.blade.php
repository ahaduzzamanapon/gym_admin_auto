<!-- Mem Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_name', 'Mem Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_name', null, ['class' => 'form-control','placeholder' => 'Enter Member Name']) !!}
        </div>
    </div>
</div>


<!-- Mem Father Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_father', 'Mem Father:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_father', null, ['class' => 'form-control','placeholder' => 'Enter Member Father Name']) !!}
        </div>
    </div>
</div>

<!-- Mem Mother Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_mother', 'Mem Mother:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_mother', null, ['class' => 'form-control','placeholder' => 'Enter Member Mother Name']) !!}
        </div>
    </div>
</div>

{{-- Mem Gender Field --}}
<div class="form-group">
    <div class="row">
        {!! Form::label('gender', 'Gender:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            <div class="form-check form-check-inline">
                {!! Form::radio('mem_gender', 'male', false, ['class' => 'form-check-input', 'id' => 'genderMale']) !!}
                {!! Form::label('genderMale', 'Male', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline">
                {!! Form::radio('mem_gender', 'female', false, ['class' => 'form-check-input', 'id' => 'genderFemale']) !!}
                {!! Form::label('genderFemale', 'Female', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline">
                {!! Form::radio('mem_gender', 'other', false, ['class' => 'form-check-input', 'id' => 'genderOther']) !!}
                {!! Form::label('genderOther', 'Other', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
</div>



<!-- Mem Address Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_address', 'Mem Address:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_address', null, ['class' => 'form-control','placeholder' => 'Enter Member Address']) !!}
        </div>
    </div>
</div>


<!-- Mem Admission Date Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_admission_date', 'Mem Admission Date:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::date('mem_admission_date', null, ['class' => 'form-control','id'=>'mem_admission_date']) !!}
        </div>
    </div>
</div>

{{-- @section('footer_scripts')
<script type="text/javascript">
    $('#mem_admission_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endsection --}}


<!-- Mem Cell Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_cell', 'Mem Cell:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mem_cell', null, ['class' => 'form-control','placeholder' => 'Enter Member Cell']) !!}
        </div>
    </div>
</div>


<!-- Mem Email Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_email', 'Mem Email:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::email('mem_email', null, ['class' => 'form-control','placeholder' => 'Enter Member Email']) !!}
        </div>
    </div>
</div>
<!-- Mem mem type Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_type', 'Mem Type:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('mem_type', ['member' => 'member','staff' => 'staff'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<!-- Mem punch id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('punch_id', 'Mem Punch Id:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('punch_id', null, ['class' => 'form-control','placeholder' => 'Enter Member Punch Id']) !!}
        </div>
    </div>
</div>
<!-- Mem Img Url Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mem_img_url', 'Mem Img Url:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::file('mem_img_url', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

@php
$groups = DB::table('groups')->get();
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


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('members.index') }}" class="btn btn-default">Cancel</a>
</div>

