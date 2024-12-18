<!-- Logo Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('logo_name', 'Logo Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('logo_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Banner Status Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('banner_status', 'Banner Status:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::select('banner_status', ['video' => 'video', 'image' => 'image'], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</>


<!-- Banner Image Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('banner_image', 'Banner Image:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">{!! Form::file('banner_image') !!}
        </div>
    </div>
</div> <div class="clearfix"> </div>


<!-- Banner Video Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('banner_video', 'Banner Video:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::file('banner_video', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Title Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('title', 'Title:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Small Banner Text Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('small_banner_text', 'Small Banner Text:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('small_banner_text', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Big Banner Text Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('big_banner_text', 'Big Banner Text:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('big_banner_text', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Fotter Text Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('fotter_text', 'Fotter Text:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('fotter_text', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('siteProfiles.index') }}" class="btn btn-danger">Cancel</a>
</div>
