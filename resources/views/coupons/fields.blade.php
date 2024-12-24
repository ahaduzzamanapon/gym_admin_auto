<!-- Title Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('title', 'Title:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Coupon Code Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('coupon_code', 'Coupon Code:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('coupon_code', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<script>
    // Automatically convert input to lowercase
    document.getElementById('coupon_code').addEventListener('input', function () {
        this.value = this.value.toLowerCase();
    });
</script>


<!-- Expire Date Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('expire_date', 'Expired Date:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::date('expire_date', null, ['class' => 'form-control','id'=>'expire_date']) !!}
        </div>
    </div>
</div>

{{-- @section('footer_scripts')
<script type="text/javascript">
    $('#expire_date').datepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endsection --}}


<!-- Amount Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('amount', 'Amount:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('amount', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Note Field -->
<div class="form-group ">
    <div class="row">
        {!! Form::label('note', 'Note:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('coupons.index') }}" class="btn btn-danger">Cancel</a>
</div>



