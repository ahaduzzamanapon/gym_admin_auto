
@php
if(if_can('show_all_data')){
    $members = DB::table('members')->get();
}else {
    $members = DB::table('members')->where('id', Auth::user()->member_id)->get();

}

$packages = DB::table('packages')->get();
@endphp

<!-- Member Id Field -->
<div class="form-group" style="display: @if(if_can('show_all_data'))block @else none @endif;">
    <div class="row">
        {!! Form::label('member_id', 'Member Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('member_id', $members->pluck('mem_name', 'id') ,null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>



<!-- Package Id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('package_id', 'Package Id:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('package_id', $packages->pluck('pack_name', 'id')->prepend('Select Package', '')  ,null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>





<!-- Amount Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('amount', 'Amount:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('amount', 0, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Tax Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('tax', 'Tax Percentage:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('tax', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Coupons Id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('coupons_id', 'Coupons code:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('coupons_id', null, ['class' => 'form-control']) !!}
            <span class="text-danger" id="coupons_id_error"></span>
            <span class="text-success" id="coupons_id_success"></span>
        </div>
    </div>
</div>

<!-- Coupon Amount Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('coupon_amount', 'Coupon Amount:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('coupon_amount', 0, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Gross Amount Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('gross_amount', 'Gross Amount:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('gross_amount', 0, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('purchasePackages.index') }}" class="btn btn-default">Cancel</a>
</div>


<script>
    $(document).ready(function() {
        $('#coupons_id').on('input', function() {
            var coupons_id = $(this).val();
            $.ajax({
                url: "{{ route('coupons.check') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'coupons_id': coupons_id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        $('#coupon_amount').val(response.data['amount']);
                        $('#coupons_id_error').text('');
                        $('#coupons_id_success').text('Valid Coupons Code');
                    }else{
                        $('#coupon_amount').val(0);
                        $('#coupons_id_error').text('Invalid Coupons Code Or Expired');
                        $('#coupons_id_success').text('');
                    }
                    calculate()
                }
            });
            
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#package_id').on('change', function() {
            var package_id = $(this).val();
            $.ajax({
                url: "{{ route('packages.check') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'package_id': package_id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        $('#amount').val(response.data['pack_admission_fee']);
                    }else{
                        $('#amount').val(0);
                    }
                    calculate()
                }
            });
            
        })
      })
</script>
<script>
    function calculate() {
        console.log('calculate');
        
        var amount = document.getElementById('amount').value;
        var coupon_amount = document.getElementById('coupon_amount').value;
        var tax = document.getElementById('tax').value;
        if (tax == '') {
            tax = 0;
        }
        var total = parseFloat(amount) + ((parseFloat(amount) * parseFloat(tax)) / 100)-parseFloat(coupon_amount);

        document.getElementById('gross_amount').value = total;
    }
</script>
<script>
    $(document).ready(function() {
        $('#tax').on('input', function() {
            calculate()
        })

        setInterval(() => {
            $('#package_id').trigger('change');
            $('#coupons_id').trigger('input');
        }, 1000);
        calculate()
    })
</script>
