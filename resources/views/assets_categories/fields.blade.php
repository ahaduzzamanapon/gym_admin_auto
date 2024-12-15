<!-- Category Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('category_name', 'Category Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('category_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Description Field -->
<div class="form-group ">
    <div class="row">
        {!! Form::label('description', 'Description:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('assetsCategories.index') }}" class="btn btn-danger">Cancel</a>
</div>
