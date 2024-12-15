<!-- Title Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('title', 'Title:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


@php
$multi_branchs = DB::table('multi_branchs')->get();
@endphp
<!-- group Img Url Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('branch_id', 'Branch:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('branch_id', $multi_branchs->pluck('branch_name', 'id')->prepend('Select Branch', ''), null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Amount Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('amount', 'Amount:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('amount', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Description Field -->
<div class="form-group ">
    <div class="row">
        {!! Form::label('description', 'Description:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('expenses.index') }}" class="btn btn-danger">Cancel</a>
</div>
