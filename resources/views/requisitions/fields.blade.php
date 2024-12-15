<!-- Title Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('Title', 'Title:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('Title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


@php
if(if_can('show_all_data')){
    $members = DB::table('members')->get();
}else {
    $members = DB::table('members')->where('id', Auth::user()->member_id)->get();

}

$products = DB::table('products')->get();
@endphp

<!-- Member name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('member_id', 'Member name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('member_id', $members->pluck('mem_name', 'id')->prepend('Select Member', ''), null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>





<!-- Product Id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('product_id', 'Product Id:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('product_id', $products->pluck('product_name', 'id')->prepend('Select Product', ''), null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Status Field -->
<div class="form-group" style="display: @if(if_can('show_all_data')) block @else none @endif;">
    <div class="row">
        {!! Form::label('status', 'Status:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('status', ['1' => 'Pending', '2' => 'Approved', '3' => 'Rejected'], null, ['class' => 'form-control']) !!}
            
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('requisitions.index') }}" class="btn btn-danger">Cancel</a>
</div>
