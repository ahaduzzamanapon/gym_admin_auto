<!-- Trainer Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('trainer_name', 'Trainer Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('trainer_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Trainer Type Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('trainer_type', 'Trainer Type:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('trainer_type', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Image Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('image', 'Image:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">{!! Form::file('image') !!}
        </div>
    </div>
</div> <div class="clearfix">
</div>


<!-- Description Field -->
<div class="form-group ">
    <div class="row">
        {!! Form::label('description', 'Description: max(100 characters)',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
        </div>
    </div>
</div>


<!-- Facebook Link Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('facebook_link', 'Facebook Link:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('facebook_link', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Twitter Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('twitter', 'Twitter:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Linkedin Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('linkedin', 'Linkedin:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('linkedin', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('siteTrainers.index') }}" class="btn btn-danger">Cancel</a>
</div>
