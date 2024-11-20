<!-- Item Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('item_name', 'Item Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('item_name', null, ['class' => 'form-control']) !!}
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
    <a href="{{ route('assetsManagements.index') }}" class="btn btn-default">Cancel</a>
</div>
