<!-- Member name Field -->



<div class="form-group">
    <div class="row">
            @include('componant.member_select')
    </div>
</div>


<!-- Measurement Date Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('measurement_date', 'Measurement Date:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            @php
            if (isset($healthmetric)) {
                $measurement_date = $healthmetric->measurement_date;
            }else
            {
                $measurement_date = date('Y-m-d');
            }
            @endphp
            {!! Form::date('measurement_date', date('Y-m-d', strtotime($measurement_date) ), ['class' => 'form-control', 'id' => 'measurement_date']) !!}
            @error('measurement_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<script>
    document.getElementById('measurement_date').addEventListener('click', function() {
        this.showPicker();
    });
</script>



<!-- Weight Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('weight', 'Weight:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Enter Weight', 'id' => 'weight']) !!}
            @error('weight')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- Height Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('height', 'Height (CM):', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('height', null, ['class' => 'form-control', 'placeholder' => 'Enter Height', 'id' => 'height']) !!}
            @error('height')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- BMI Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('bmi', 'BMI:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('bmi', null, [
                'class' => 'form-control',
                'placeholder' => 'BMI Will Be Calculated',
                'id' => 'bmi',
                'readonly',
            ]) !!}
            @error('bmi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<!-- BMI Status Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('bmi_status', 'BMI Status:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('bmi_status', null, [
                'class' => 'form-control',
                'placeholder' => 'BMI Status Will Be Displayed',
                'id' => 'bmi_status',
                'readonly',
            ]) !!}
        </div>
    </div>
</div>


<!-- Body Fat Percentage Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('body_fat_percentage', 'Body Fat Percentage:', [
            'class' => 'col-md-3 col-lg-3 col-12 control-label',
        ]) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('body_fat_percentage', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Body Fat Percentage',
            ]) !!}
            @error('body_fat_percentage')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Muscle Mass Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('muscle_mass', 'Muscle Mass:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('muscle_mass', null, ['class' => 'form-control', 'placeholder' => 'Enter Muscle Mass']) !!}
            @error('muscle_mass')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Hydration Level Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('hydration_level', 'Hydration Level:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('hydration_level', null, ['class' => 'form-control', 'placeholder' => 'Enter Hydration Level']) !!}
            @error('hydration_level')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<!-- Chest Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('chest', 'Chest:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('chest', null, ['class' => 'form-control', 'placeholder' => 'Enter Chest']) !!}
            @error('chest')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Waist Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('waist', 'Waist:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('waist', null, ['class' => 'form-control', 'placeholder' => 'Enter Waist']) !!}
            @error('waist')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Hips Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('hips', 'Hips:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('hips', null, ['class' => 'form-control', 'placeholder' => 'Enter Hips']) !!}
            @error('hips')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Thighs Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('thighs', 'Thighs:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('thighs', null, ['class' => 'form-control', 'placeholder' => 'Enter Thighs']) !!}
            @error('thighs')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Arms Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('arms', 'Arms:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('arms', null, ['class' => 'form-control', 'placeholder' => 'Enter Arms']) !!}
            @error('arms')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Forearms Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('forearms', 'Forearms:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('forearms', null, ['class' => 'form-control', 'placeholder' => 'Enter Forearms']) !!}
            @error('forearms')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Neck Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('neck', 'Neck:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('neck', null, ['class' => 'form-control', 'placeholder' => 'Enter Neck']) !!}
            @error('neck')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Shoulders Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('shoulders', 'Shoulders:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('shoulders', null, ['class' => 'form-control', 'placeholder' => 'Enter Shoulders']) !!}
            @error('shoulders')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Calves Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('calves', 'Calves:', ['class' => 'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('calves', null, ['class' => 'form-control', 'placeholder' => 'Enter Calves']) !!}
            @error('calves')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Resting Heart Rate Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('resting_heart_rate', 'Resting Heart Rate:', [
            'class' => 'col-md-3 col-lg-3 col-12 control-label',
        ]) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('resting_heart_rate', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Resting Heart Rate',
            ]) !!}
            @error('resting_heart_rate')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('healthmetrics.index') }}" class="btn btn-danger">Cancel</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function calculateBMI() {
        const weight = parseFloat(document.getElementById('weight').value); // Get weight value
        const height_cm = parseFloat(document.getElementById('height').value); // Get height value
        height = height_cm / 100; // Convert height to meters
        const statusField = document.getElementById('bmi_status'); // Get the status field

        if (!isNaN(weight) && !isNaN(height) && height > 0) {
            const bmi = weight / (height * height); // BMI formula
            document.getElementById('bmi').value = bmi.toFixed(2); // Display BMI with 2 decimal places

            // Determine BMI status based on the value
            let status = '';
            if (bmi < 18.5) {
                status = 'Underweight';
            } else if (bmi >= 18.5 && bmi <= 24.9) {
                status = 'Healthy Weight';
            } else if (bmi >= 25.0 && bmi <= 29.9) {
                status = 'Overweight';
            } else if (bmi >= 30.0) {
                status = 'Obesity';
            }

            statusField.value = status; // Update the status field
        } else {
            document.getElementById('bmi').value = ''; // Clear BMI field if inputs are invalid
            statusField.value = ''; // Clear status field if inputs are invalid
        }
    }

    // Attach event listeners to the height and weight fields
    document.getElementById('weight').addEventListener('input', calculateBMI);
    document.getElementById('height').addEventListener('input', calculateBMI);
</script>
