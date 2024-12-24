<div class="container">
    <div class="row">
    {{-- manndatory --}}

        <!-- Member ID 1 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('member_unique_id', 'Member ID:', ['class' => 'control-label']) !!}
                {!! Form::text('member_unique_id', null, ['class' => 'form-control','required','placeholder' => 'Enter Member ID']) !!}
                @error('member_unique_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Member Name2 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_name', 'Member Name:', ['class' => 'control-label']) !!}
                {!! Form::text('mem_name', null, ['class' => 'form-control','required', 'placeholder' => 'Enter Member Name']) !!}
                @error('mem_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Gender5 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_gender', 'Gender:', ['class' => 'control-label']) !!}
                <div style="display: flex;flex-direction: row;gap: 11px;align-items: center;">
                    <div class="form-check">
                        {!! Form::radio('mem_gender', 'Male', false, ['class' => 'form-check-input', 'id' => 'genderMale']) !!}
                        {!! Form::label('genderMale', 'Male', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::radio('mem_gender', 'Female', false, ['class' => 'form-check-input', 'id' => 'genderFemale']) !!}
                        {!! Form::label('genderFemale', 'Female', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check">
                        {!! Form::radio('mem_gender', 'Other', false, ['class' => 'form-check-input', 'id' => 'genderOther']) !!}
                        {!! Form::label('genderOther', 'Other', ['class' => 'form-check-label']) !!}
                    </div>
                </div>
                @error('mem_gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Address6 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_address', 'Address:', ['class' => 'control-label']) !!}
                {!! Form::text('mem_address', null, ['class' => 'form-control','required', 'placeholder' => 'Enter Address']) !!}
                @error('mem_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        {{-- Mem Type Field 35 --}}
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_type', 'Member Type:', ['class' => 'control-label']) !!}
                {!! Form::select('mem_type', ['member' => 'Member', 'staff' => 'Staff'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                    @error('mem_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
        </div>

        <!-- Mem punch id Field 36 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('punch_id', 'Member Punch Id:',['class'=>'control-label']) !!}
                {!! Form::text('punch_id', null, ['class' => 'form-control','placeholder' => 'Enter Member Punch Id']) !!}
                @error('punch_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Mem Img Url Field 37 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_img_url', 'Member Image:',['class'=>'control-label']) !!}
                {!! Form::file('mem_img_url', null, ['class' => 'form-control']) !!}
            </div>
        </div>

                
        @php
        $groups = DB::table('groups')->get();
        $multi_branchs = DB::table('multi_branchs')->get();
        @endphp
        <!-- group Field 38 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('group_id', 'Group:',['class'=>'control-label']) !!}
                {!! Form::select('group_id', $groups->pluck('name', 'id')->prepend('Select Group', ''), null, ['required','class' => 'form-control']) !!}
                
            </div>
        </div>
        <!-- branch Field 39 -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="branch_id" class="control-label">
                    Branch: <span class="text-danger">*</span>
                </label>       
               {!! Form::select('branch_id', $multi_branchs->pluck('branch_name', 'id')->prepend('Select Branch', ''), null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
        </div>

        
        <!-- Admission7 Date -->
        <div class="col-md-3">
            <div class="form-group">
                @php $admissionDate= isset($member) ? date('Y-m-d', strtotime($member->mem_admission_date)) : date('Y-m-d'); @endphp
                {!! Form::label('mem_admission_date', 'Admission Date:', ['class' => 'control-label']) !!}
                {!! Form::date('mem_admission_date', $admissionDate, ['required','class' => 'form-control']) !!}
                @error('mem_admission_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- Admission7 Date -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_admission_fees', 'Admission Fees:', ['class' => 'control-label']) !!}
                {!! Form::number('mem_admission_fees', null, ['required','class' => 'form-control']) !!}
                @error('mem_admission_fees')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Date of Birth8 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('date_of_birth', 'Date of Birth:', ['class' => 'control-label']) !!}
                {!! Form::date('date_of_birth', null, ['required','class' => 'form-control']) !!}
                @error('date_of_birth')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Cell9 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_cell', 'Cell Number:', ['class' => 'control-label']) !!}
                {!! Form::text('mem_cell', null, ['class' => 'form-control','required', 'placeholder' => 'Enter Cell Number']) !!}
                @error('mem_cell')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Email10 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_email', 'Email:', ['class' => 'control-label']) !!}
                {!! Form::email('mem_email', null, ['class' => 'form-control','required', 'placeholder' => 'Enter Email']) !!}
                @error('mem_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Height11 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('height', 'Height (cm):', ['class' => 'control-label']) !!}
                {!! Form::text('height', null, ['class' => 'form-control', 'placeholder' => 'Enter Height']) !!}
                @error('height')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Weight12 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('weight', 'Weight (kg):', ['class' => 'control-label']) !!}
                {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Enter Weight']) !!}
                @error('weight')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- BMI13 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('bmi', 'BMI:', ['class' => 'control-label']) !!}
                {!! Form::text('bmi', null, ['class' => 'form-control', 'placeholder' => 'Enter BMI']) !!}
                @error('bmi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        


        {{-- manndatory end --}}

    </div>
    <div class="row">
            

        <!-- Father Name3 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_father', 'Father\'s Name:', ['class' => 'control-label']) !!}
                {!! Form::text('mem_father', null, ['class' => 'form-control', 'placeholder' => 'Enter Father\'s Name']) !!}
                @error('mem_father')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Mother Name4 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('mem_mother', 'Mother\'s Name:', ['class' => 'control-label']) !!}
                {!! Form::text('mem_mother', null, ['class' => 'form-control', 'placeholder' => 'Enter Mother\'s Name']) !!}
                @error('mem_mother')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Waist14 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('waist', 'Waist (cm):', ['class' => 'control-label']) !!}
                {!! Form::text('waist', null, ['class' => 'form-control', 'placeholder' => 'Enter Waist Size']) !!}
                @error('waist')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Blood Group15 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('blood_group', 'Blood Group:', ['class' => 'control-label']) !!}
                {!! Form::select('blood_group', ['A+' => 'A+', 'B+' => 'B+', 'O+' => 'O+', 'AB+' => 'AB+', 'A-' => 'A-', 'B-' => 'B-', 'O-' => 'O-', 'AB-' => 'AB-'], null, ['class' => 'form-control', 'placeholder' => 'Select Blood Group']) !!}
                @error('blood_group')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Blood Pressure16 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('blood_pressure', 'Blood Pressure:', ['class' => 'control-label']) !!}
                {!! Form::text('blood_pressure', null, ['class' => 'form-control', 'placeholder' => 'Enter Blood Pressure']) !!}
                @error('blood_pressure')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Profession17 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('profession', 'Profession:', ['class' => 'control-label']) !!}
                {!! Form::text('profession', null, ['class' => 'form-control', 'placeholder' => 'Enter Profession']) !!}
                @error('profession')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Office Address18 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('office_address', 'Office Address:', ['class' => 'control-label']) !!}
                {!! Form::text('office_address', null, ['class' => 'form-control', 'placeholder' => 'Enter Office Address']) !!}
                @error('office_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Push Up Count19 -->
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('push_up_count', 'Push Up Count:', ['class' => 'control-label']) !!}
                {!! Form::text('push_up_count', null, ['class' => 'form-control', 'placeholder' => 'Enter Push Up Count']) !!}
                @error('push_up_count')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

               <!-- Exercise Goal 20 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('exercise_goal', 'Exercise Goal:', ['class' => 'control-label']) !!}
                    {!! Form::text('exercise_goal', null, ['class' => 'form-control', 'placeholder' => 'Enter Exercise Goal']) !!}
                    @error('exercise_goal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Current Diet Routine 21 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('current_diet_routine', 'Current Diet Routine:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('current_diet_routine', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Describe Diet Routine']) !!}
                    @error('current_diet_routine')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Sassoon Exercise Time 22 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('sassoon_exercise_time', 'Exercise Time:', ['class' => 'control-label']) !!}
                    {!! Form::text('sassoon_exercise_time', null, ['class' => 'form-control', 'placeholder' => 'Enter Exercise Time']) !!}
                    @error('sassoon_exercise_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Sleep Time 23 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('sleep_time', 'Sleep Time:', ['class' => 'control-label']) !!}
                    {!! Form::text('sleep_time', null, ['class' => 'form-control', 'placeholder' => 'Enter Sleep Time']) !!}
                    @error('sleep_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Wake Up Time 24 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('wake_up_time', 'Wake Up Time:', ['class' => 'control-label']) !!}
                    {!! Form::text('wake_up_time', null, ['class' => 'form-control', 'placeholder' => 'Enter Wake Up Time']) !!}
                    @error('wake_up_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Work Time 25 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('work_time', 'Work Time:', ['class' => 'control-label']) !!}
                    {!! Form::text('work_time', null, ['class' => 'form-control', 'placeholder' => 'Enter Work Time']) !!}
                    @error('work_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Exercise History 26 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('exercise_history', 'Exercise History:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('exercise_history', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Describe Exercise History']) !!}
                    @error('exercise_history')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Medicine History 27 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('medicine_history', 'Medicine History:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('medicine_history', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Describe Medicine History']) !!}
                    @error('medicine_history')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Injury or Health Issue 28 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('injury_or_health_issue', 'Injury or Health Issue:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('injury_or_health_issue', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Describe Injuries or Health Issues']) !!}
                    @error('injury_or_health_issue')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Like or Dislike Exercise 29 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('like_or_dislike_exercise', 'Like/Dislike Exercise:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('like_or_dislike_exercise', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Describe Preferences for Exercise']) !!}
                    @error('like_or_dislike_exercise')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Like or Dislike Food 30 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('like_or_dislike_food', 'Like/Dislike Food:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('like_or_dislike_food', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Describe Preferences for Food']) !!}
                    @error('like_or_dislike_food')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Pull Up Count 31 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('pull_up_count', 'Pull Up Count:', ['class' => 'control-label']) !!}
                    {!! Form::text('pull_up_count', null, ['class' => 'form-control', 'placeholder' => 'Enter Pull Up Count']) !!}
                    @error('pull_up_count')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
    
            <!-- Lift Count (Kg) 32 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('lift_count_kg', 'Lift Count (Kg):', ['class' => 'control-label']) !!}
                    {!! Form::text('lift_count_kg', null, ['class' => 'form-control', 'placeholder' => 'Enter Lift Count (Kg)']) !!}
                    @error('lift_count_kg')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    
            <!-- Question  33-->
            {{-- <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('question', 'Question:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('question', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Enter Question']) !!}
                    @error('question')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}


            @php
                $packages = DB::table('packages')->get();
            @endphp
            <style>
                .switch {
                font-size: 17px;
                position: relative;
                display: inline-block;
                width: 62px;
                height: 35px;
                }

                /* Hide default HTML checkbox */
                .switch input {
                opacity: 1;
                width: 0;
                height: 0;
                }

                /* The slider */
                .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0px;
                background: #fff;
                transition: .4s;
                border-radius: 30px;
                border: 1px solid #ccc;
                }

                .slider:before {
                position: absolute;
                content: "";
                height: 1.9em;
                width: 1.9em;
                border-radius: 16px;
                left: 1.2px;
                top: 0;
                bottom: 0;
                background-color: white;
                box-shadow: 0 2px 5px #999999;
                transition: .4s;
                }

                input:checked + .slider {
                background-color: #5fdd54;
                border: 1px solid transparent;
                }

                input:checked + .slider:before {
                transform: translateX(1.5em);
                }
            </style>
            <div class="row">
                <h5>Packages Active</h5>
                <label class="switch">
                  <input type="checkbox" id="package_switch" name="package_switch" value="1">
                  <span class="slider"></span>
                </label>
            </div>
            <div class="row" id="package_add">
                <div class="form-group col-md-4">
                    {!! Form::label('package_id', 'Package Id:',['class'=>'control-label']) !!}
                    {!! Form::select('package_id', $packages->pluck('pack_name', 'id')->prepend('Select Package', '')  ,null, ['class' => 'form-control','required'=>'required']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('amount', 'Amount:',['class'=>'control-label']) !!}
                    {!! Form::number('amount', 0, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('tax', 'Vat Percentage:',['class'=>'control-label']) !!}
                    {!! Form::number('tax', 0, ['class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('coupons_id', 'Coupon Code:', ['class' => 'control-label']) !!}
                    {!! Form::text('coupons_id', null, ['class' => 'form-control', 'id' => 'coupons_id']) !!}
                    <span class="text-danger" id="coupons_id_error"></span>
                    <span class="text-success" id="coupons_id_success"></span>
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('coupon_amount', 'Coupon Amount:',['class'=>'control-label']) !!}
                    {!! Form::number('coupon_amount', 0, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('gross_amount', 'Gross Amount:',['class'=>'control-label']) !!}
                    {!! Form::number('gross_amount', 0, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('pay_amount', 'Pay Amount:',['class'=>'control-label']) !!}
                    {!! Form::number('pay_amount', 0, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('due_amount', 'Due Amount:',['class'=>'control-label']) !!}
                    {!! Form::number('due_amount', 0, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('status', 'Status:',['class'=>'control-label']) !!}
                    {!! Form::select('status', ['' => 'Select Status','1' => 'Pending','2' => 'Due','3' => 'Full Paid'], null, ['class' => 'form-control','readonly','required'=>'required']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('expired_date', 'Expired Date:',['class'=>'control-label']) !!}
                    {!! Form::date('expired_date', null, ['class' => 'form-control','readonly','required'=>'required']) !!}
                </div>
            </div>
    
            <!-- Terms and Conditions 34 -->
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('term_con', 'Terms & Conditions:', ['class' => 'control-label']) !!}
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="term_con" value="yes" id="term_con" required {{ isset($member->term_con) && $member->term_con == 'yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="term_con">I agree to the terms and conditions</label>
                    </div>
                    @error('term_con')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Submit and Cancel Buttons -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('members.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
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
    // Automatically convert input to lowercase
    document.getElementById('coupons_id').addEventListener('input', function () {
        this.value = this.value.toLowerCase();
    });
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
                        $('#expired_date').val(response.expire_date);
                    }else{
                        $('#amount').val(0);
                        $('#expired_date').val('');
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
        var pay_amount = document.getElementById('pay_amount').value;
        if (pay_amount == '') {
            pay_amount = 0;
        }
        var due_amount = total - parseFloat(pay_amount);
        document.getElementById('due_amount').value = due_amount;
        if (pay_amount==0) {
            document.getElementById('status').value = 1;
        }
        if (pay_amount>0 && due_amount>0) {
            document.getElementById('status').value = 2;
        }
        if (pay_amount>0 && due_amount==0) {
            document.getElementById('status').value = 3;
        }
        
    }
</script>
<script>
    $(document).ready(function() {
        $('#tax').on('input', function() {
            calculate()
        })
        $('#pay_amount').on('input', function() {
            calculate()
        })
        $('#pay_amount').on('input', function() {
            calculate()
        })
        calculate()
    })
</script>

<script>
    $(document).ready(function() {
        $('#package_add').hide();
        $('#package_switch').on('change', function() {
            if ($(this).is(':checked')) {
                $('#package_add').show();
                required(true);
            } else {
                $('#package_add').hide();
                required(false);
            }
        })
    })
    function required(status) {
        if (status == true) {
            $('#package_id').attr('required', 'required');
            $('#amount').attr('required', 'required');
            $('#gross_amount').attr('required', 'required');
            $('#pay_amount').attr('required', 'required');
            $('#due_amount').attr('required', 'required');
            $('#status').attr('required', 'required');
            $('#expired_date').attr('required', 'required');
        }else{
            $('#package_id').removeAttr('required');
            $('#amount').removeAttr('required');
            $('#gross_amount').removeAttr('required');
            $('#pay_amount').removeAttr('required');
            $('#due_amount').removeAttr('required');
            $('#status').removeAttr('required');
            $('#expired_date').removeAttr('required');
        }
        
    }
    
    function calculateBMI() {
        const weight = parseFloat(document.getElementById('weight').value); // Get weight value
        const height_cm = parseFloat(document.getElementById('height').value); // Get height value
        height = height_cm / 100; // Convert height to meters

        if (!isNaN(weight) && !isNaN(height) && height > 0) {
            const bmi = weight / (height * height); // BMI formula
            document.getElementById('bmi').value = bmi.toFixed(2); // Display BMI with 2 decimal places

           
        } else {
            document.getElementById('bmi').value = ''; // Clear BMI field if inputs are invalid
        }
    }

    // Attach event listeners to the height and weight fields
    document.getElementById('weight').addEventListener('input', calculateBMI);
    document.getElementById('height').addEventListener('input', calculateBMI);
</script>



