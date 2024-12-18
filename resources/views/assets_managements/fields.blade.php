<!-- Item Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('item_name', 'Item Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('item_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>



@php
$assets_categorys = DB::table('assets_categorys')->get();
@endphp

<div class="form-group">
    <div class="row">
        {!! Form::label('assets_categories_id', 'Categories:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('assets_categories_id', $assets_categorys->pluck('category_name', 'id')->prepend('Select Categories', ''), null, ['class' => 'form-control']) !!}
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


<div class="form-group">
    <div class="row">
        {!! Form::label('asset_for', 'Asset For:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('asset_for', ['' => 'Select Asset For', 'Staff' => 'Staff','Member' => 'Member'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Item Quantity Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('item_quantity', 'Item Quantity:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('item_quantity', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>



<!-- Item Description Field -->
<div class="form-group ">
    <div class="row">
        {!! Form::label('item_description', 'Item Description:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::textarea('item_description', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Location Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('location', 'Location:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('location', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Status Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('status', 'Status:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('status', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('assetsManagements.index') }}" class="btn btn-danger">Cancel</a>
</div>
