@php
if(if_can('show_all_data')){
    $members = DB::table('members')->get();
}else {
    $members = DB::table('members')->where('id', Auth::user()->member_id)->get();
}
$asset=DB::table('assets_managements')->where('asset_for', 'Staff')->get();
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
<!-- Member name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('asset_id', 'Asset name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('asset_id', $asset->pluck('item_name', 'id')->prepend('Select Asset', ''), null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Booking Date Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('booking_date', 'Booking Date Time:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12" style="display: flex;gap: 12px;">

            {!! Form::date('booking_date', (isset($schedulebooking->booking_date)) ? date('Y-m-d', strtotime($schedulebooking->booking_date)) : null, ['class' => 'form-control','id'=>'booking_date','format'=>'Y-m-d']) !!}
            {!! Form::time('booking_time', null, ['class' => 'form-control','id'=>'booking_time']) !!}
        </div>
    </div>
</div>

{{-- @section('footer_scripts')
<script type="text/javascript">
    $('#booking_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
</script>
@endsection --}}


<!-- Service Type Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('service_type', 'Service Type:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('service_type', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Status Field -->
<div class="form-group" style="display: @if(!if_can('show_all_data')) none @endif;">
    <div class="row">
        {!! Form::label('status', 'Status:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('status', ['1' => 'Pending','2' => 'Approved'], null, ['class' => 'form-control']) !!}
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
    <a href="{{ route('schedulebookings.index') }}" class="btn btn-default">Cancel</a>
</div>
