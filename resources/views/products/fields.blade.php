<!-- Product Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('product_name', 'Product Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
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


<!-- Product Price Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('product_price', 'Product Price:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('product_price', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Product Qty Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('product_qty', 'Product Qty:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('product_qty', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Product Img Url Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('product_img_url', 'Product Img Url:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">{!! Form::file('product_img_url') !!}
        </div>
    </div>
</div <div class="clearfix">
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
</div>
