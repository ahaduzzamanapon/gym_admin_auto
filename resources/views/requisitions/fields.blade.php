
@php
$products = DB::table('products')->get();
@endphp



<!-- Title Field -->
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('Title', 'Title:',['class'=>'control-label']) !!}
            {!! Form::text('Title', null, ['class' => 'form-control']) !!}
        </div>
    </div>


    @include('componant.member_select')

    <!-- Product Id Field -->
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('product_id', 'Product Name:',['class'=>'control-label']) !!}
            {!! Form::select('product_id', $products->pluck('product_name', 'id')->prepend('Select Product', ''), null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <!-- Title Field -->
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('qty', 'Quantity:',['class'=>'control-label']) !!}
            {!! Form::number('qty', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <!-- Status Field -->
    <div class="col-md-4">
            <div class="form-group" style="display: @if(if_can('show_all_data')) block @else none @endif;">
            {!! Form::label('status', 'Status:',['class'=>'control-label']) !!}
            {!! Form::select('status', ['1' => 'Pending', '2' => 'Approved', '3' => 'Rejected', '4' => 'Delivered'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>











<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('requisitions.index') }}" class="btn btn-danger">Cancel</a>
</div>


 <script>
        var $jq = jQuery.noConflict();
        $jq(document).ready(function() {
            $jq('#product_id').chosen();
        });
</script>
