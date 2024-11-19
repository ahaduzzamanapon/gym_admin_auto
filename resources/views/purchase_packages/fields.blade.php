<!-- Member Id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('member_id', 'Member Id:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('member_id', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Package Id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('package_id', 'Package Id:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('package_id', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Coupons Id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('coupons_id', 'Coupons Id:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('coupons_id', null, ['class' => 'form-control']) !!}
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


<!-- Tax Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('tax', 'Tax:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('tax', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Coupon Amount Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('coupon_amount', 'Coupon Amount:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('coupon_amount', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Gross Amount Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('gross_amount', 'Gross Amount:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('gross_amount', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('purchasePackages.index') }}" class="btn btn-default">Cancel</a>
</div>
