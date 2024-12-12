<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multi-Step Admission Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <style>
    body {
      background-color: #f3f4f6;
      font-family: 'Poppins', sans-serif;
      padding: 30px;
    }

    .form-container {
      max-width: 80vw;
      margin: auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    input{
        border-radius: 4px;
        border: 1px solid #7e7e7e;
    }

    .form-section {
      display: none;
    }

    .form-section.active {
      display: block;
    }

    .btn-custom {
    width: 100px;
    margin: 10px 0;
    border: none;
    cursor: pointer !important;
    background: #00996c;
    color: white;
    padding: 4px;
    border-radius: 5px;
    transition: background 0.3s ease;
}

    .btn-custom:hover {
      background:#1ee6aa;
    }
    .form-check {
        display: flex;
        gap: 21px;
    }
    .col-md-3 {
        margin-bottom: 25px;
    }
  </style>
</head>
<body>
  <div class="form-container">
        <h3 class="text-center">{{$siteSettings->name}}</h3>
        <h4 class="text-center">{{$siteSettings->slogan}}</h4>
        <h3 class="text-center mb-4">সদস্য আবেদন ফরম</h3>
    <form id="multiStepForm" action="{{ route('admission.store') }}" method="POST">
      <!-- Step 1: Accept Terms & Conditions -->
      <div class="form-section active">
        <h3>নিয়মাবলী </h3>
        <div class="mb-4">
            <div class="row">
                @foreach ($TermAndCondition as $key => $termAndCondition)
                    <div class="col-md-12">
                       {{ $key + 1}}. {{ $termAndCondition->title }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
          <div class="form-check">
            <input  type="checkbox" class="form-check-input" id="terms" required>
            <label class="form-check-label" for="terms">আমি সকল নিয়মাবলী পড়েছি এবং সমর্থন করি.</label> <br>
          </div>
        </div>
        <button type="button" class="btn-custom" onclick="nextStep(1)">Next</button>
      </div>

      <!-- Step 2: Questions -->
      <div class="form-section">
        <h3>সকল প্রস্নের উত্তর দিন</h3>


           <!-- Questions -->
           <div class="mb-4">
            <div class="row">
                @foreach ($AdmissionQuestions as $key => $question)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>{{ $key + 1  }}. {{ $question->questions }}</label> <br>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="question_{{ $question->id }}" value="yes,{{ $question->id }}"> হ্যাঁ
                                </label> <br>
                                <label class="form-check-label ms-3">
                                    <input class="form-check-input" type="radio" name="question_{{ $question->id }}" value="no,{{ $question->id }}"> না
                                </label> <br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        
        <button type="button" class="btn-custom" onclick="prevStep(1)">Previous</button>
        <button type="button" class="btn-custom" onclick="nextStep(2)">Next</button>
      </div>

      <!-- Step 3: Personal Details -->
      <div class="form-section">
        <h3> Personal Information</h3>
        
             <!-- Personal Details -->
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="member_no">সদস্য নম্বর:</label> <br>
            <input  class="form-control" type="text" id="member_no" name="member_no" value="{{ $members->member_unique_id }}" readonly>
        </div>
        <div class="col-md-3 form-group">
            <label for="name">নাম:</label> <br>
            <input  class="form-control" type="text" id="name" name="name" value="{{ $members->mem_name }}" required>
        </div>
        <div class="col-md-3 form-group">
            <label for="father_name">পিতার নাম:</label> <br>
            <input  class="form-control" type="text" id="father_name" name="father_name" value="{{ $members->mem_father }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="mother_name">মাতার নাম:</label> <br>
            <input  class="form-control" type="text" id="mother_name" name="mother_name" value="{{ $members->mem_mother }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="gender">পুরুষ/মহিলা:</label> <br>
            <select id="gender" name="gender" class="form-control" required>
                <option value="Male" {{ $members->mem_gender == 'Male' ? 'selected' : '' }}>পুরুষ</option>
                <option value="Female" {{ $members->mem_gender == 'Female' ? 'selected' : '' }}>মহিলা</option>
            </select>
        </div>
        <div class="col-md-3 form-group">
            <label for="date_of_birth">জন্ম তারিখ:</label> <br>
            <input class="form-control" type="date" id="date_of_birth" name="date_of_birth" value="{{ $members->date_of_birth }}" required>
        </div>
        <div class="col-md-3 form-group">
            <label for="current_address">বর্তমান ঠিকানা:</label> <br>
            <input  class="form-control" type="text"  id="current_address" name="current_address" value="{{ $members->mem_address }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="telephone">টেলিফোন:</label> <br>
            <input  class="form-control" type="text" id="mem_cell" name="mem_cell" value="{{ $members->mem_cell }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="email">ই-মেইল:</label> <br>
            <input  class="form-control" type="email" id="mem_email" name="mem_email" value="{{ $members->mem_email }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="email">পেশা:</label> <br>
            <input  class="form-control" type="text" id="profession" name="profession" value="{{ $members->profession }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="email">অফিস ঠিকানা:</label> <br>
            <input  class="form-control" type="text" id="office_address" name="office_address" value="{{ $members->office_address }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="email">প্রতি সেসনে কতক্ষণ ব্যায়াম করতে পারেন</label> <br>
            <input  class="form-control" type="text" id="sassoon_exercise_time" name="sassoon_exercise_time" value="{{ $members->sassoon_exercise_time }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="email"> কখন ঘুমাতে যান:</label> <br>
            <input  class="form-control" type="text" id="sleep_time" name="sleep_time" value="{{ $members->sleep_time }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="email"> কখন ঘুম থেকে উঠেন:</label> <br>
            <input  class="form-control" type="text" id="wake_up_time" name="wake_up_time" value="{{ $members->wake_up_time }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="email">কর্ম ঘণ্টা:</label> <br>
            <input  class="form-control" type="text" id="work_time" name="work_time" value="{{ $members->work_time }}">
        </div>
       
        <div class="col-md-3 form-group">
            <label for="email">মেডিসিনের ইতিহাস:</label> <br>
            <input  class="form-control" type="text" id="medicine_history" name="medicine_history" value="{{ $members->medicine_history }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="email">ইনজুরি বা হেলথ ইস্যু:</label> <br>
            <input  class="form-control" type="text" id="injury_or_health_issue" name="injury_or_health_issue" value="{{ $members->injury_or_health_issue }}">
        </div>
        <div class="col-md-3 form-group">
          <label for="like_or_dislike_exercise">কোন ব্যায়াম পছন্দ করেন বা করেন না:</label> <br>
          <input  class="form-control" type="text" id="like_or_dislike_exercise" name="like_or_dislike_exercise" value="{{ $members->like_or_dislike_exercise }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="like_or_dislike_food">কোন খাদ্য পছন্দ করেন বা করেন না :</label> <br>
            <input  class="form-control" type="text" id="like_or_dislike_food" name="like_or_dislike_food" value="{{ $members->like_or_dislike_food }}">
        </div>
    </div>

    <!-- Physical Attributes -->
    <h3>Physical Attributes</h3>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="height">উচ্চতা (সেমি):</label> <br>
            <input  class="form-control" type="number" onkeyup="calculateBMI()" onchange="calculateBMI()" id="height" name="height" value="{{ $members->height }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="weight">ওজন (কেজি):</label> <br>
            <input  class="form-control" type="number" onkeyup="calculateBMI()" onchange="calculateBMI()" id="weight" name="weight" value="{{ $members->weight }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="bmi">বডি মাস ইনডেক্স (BMI):</label> <br>
            <input  class="form-control" type="text" id="bmi" name="bmi" value="{{ $members->bmi }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="waist">কোমর (সেন্টিমিটার):</label> <br>
            <input  class="form-control" type="number" id="waist" name="waist" value="{{ $members->waist }}">
        </div>
        <div class="col-md-3 form-group">
          <label for="push_up_count">পুশ আপ করতে পারেন:</label> <br>
          <input  class="form-control" type="text" id="push_up_count" name="push_up_count" value="{{ $members->push_up_count }}">
      </div>
      <div class="col-md-3 form-group">
          <label for="pull_up_count">পুল আপ করতে পারেন:</label> <br>
          <input  class="form-control" type="text" id="pull_up_count" name="pull_up_count" value="{{ $members->pull_up_count }}">
      </div>
      <div class="col-md-3 form-group">
          <label for="lift_count_kg">কতক্ষণ বহন করতে পারেন (কেজি):</label> <br>
          <input  class="form-control" type="text" id="lift_count_kg" name="lift_count_kg" value="{{ $members->lift_count_kg }}">
      </div>
    </div>

    <!-- Medical & Lifestyle -->
    <h3>Medical & Lifestyle</h3>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="blood_group">রক্তের গ্রুপ:</label> <br>
            <input  class="form-control" type="text" id="blood_group" name="blood_group" value="{{ $members->blood_group }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="blood_pressure">ব্লাড প্রেসার:</label> <br>
            <input  class="form-control" type="text" id="blood_pressure" name="blood_pressure" value="{{ $members->blood_pressure }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="pulse_rate">পালস রেট:</label> <br>
            <input  class="form-control" type="text" id="pulse_rate" name="pulse_rate" value="{{ $members->pulse_rate }}">
        </div>
       
    </div>

    <!-- Exercise & Diet -->
    <h3>Exercise & Diet</h3>
    <div class="row">
        <div class="col-md-3 form-group">
            <label for="exercise_goal">ব্যায়াম লক্ষ্য:</label> <br>
            <textarea id="exercise_goal" name="exercise_goal">{{ $members->exercise_goal }}</textarea>
        </div>
        <div class="col-md-3 form-group">
            <label for="current_diet_routine">বর্তমান ডায়েট রুটিন:</label> <br>
            <input  class="form-control" type="text" id="current_diet_routine" name="current_diet_routine" value="{{ $members->current_diet_routine }}">
        </div>
        <div class="col-md-3 form-group">
            <label for="exercise_history">ব্যায়ামের ইতিহাস:</label> <br>
            <textarea id="exercise_history" name="exercise_history">{{ $members->exercise_history }}</textarea>
        </div>
    </div>



        <button type="button" class="btn-custom" onclick="prevStep(2)">Previous</button>
        <button type="submit" class="btn-custom">Submit</button>
      </div>

    </form>
  </div>

  <script>
    let currentStep = 0;

    function showStep(step) {
      const steps = document.querySelectorAll('.form-section');
      steps.forEach((stepSection, index) => {
        if (index === step) {
          stepSection.classList.add('active');
        } else {
          stepSection.classList.remove('active');
        }
      });
    }

    function nextStep(step) {
      if (step === 1) {
        if (!document.getElementById('terms').checked) {
          alert('You must accept the terms and conditions to proceed.');
          return;
        }
      }

      currentStep = step;
      showStep(currentStep);
    }

    function prevStep(step) {
      currentStep = step - 1;
      showStep(currentStep);
    }

    // Initial display
    showStep(currentStep);

    // Handle form submission
    const form = document.getElementById('multiStepForm');
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const formData = new FormData(form);
      formData.append('_token', '{{ csrf_token() }}');

      fetch(form.action, {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === true) {
          alert('Form submitted successfully!');
          window.location.href = "{{ url('/') }}";
        } else {
          alert('An error occurred while submitting the form. Please try again.');
        }
      })
      .catch(error => {
        console.log(error);
      });
    });

  </script>

  <script>
    function calculateBMI() {
      const heightInput = document.getElementById('height');
      const weightInput = document.getElementById('weight');
      const bmiInput = document.getElementById('bmi');


      if (!heightInput || !weightInput || !bmiInput) {
        console.error('One or more input elements not found');
        return;
      }

      const heightInCm = parseFloat(heightInput.value);
      const weight = parseFloat(weightInput.value);

      if (isNaN(heightInCm) || isNaN(weight) || heightInCm <= 0) {
        console.warn('Invalid input for height or weight');
        bmiInput.value = '';
        return;
      }

      const bmi = (weight / ((heightInCm / 100) ** 2)).toFixed(2);
      bmiInput.value = bmi;
    }
  </script>
</body>
</html>
