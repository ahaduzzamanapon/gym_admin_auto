<!-- Questions Field -->
<div class="form-group ">
    <div class="row">
        {!! Form::label('questions', 'Questions:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::textarea('questions', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admissionQuestions.index') }}" class="btn btn-danger">Cancel</a>
</div>
