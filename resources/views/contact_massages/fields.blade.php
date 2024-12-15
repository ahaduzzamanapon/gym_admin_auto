<!-- Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('name', 'Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Email Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('email', 'Email:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Subject Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('subject', 'Subject:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('subject', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Message Field -->
<div class="form-group ">
    <div class="row">
        {!! Form::label('message', 'Message:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contactMassages.index') }}" class="btn btn-danger">Cancel</a>
</div>
