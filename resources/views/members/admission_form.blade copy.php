<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Poppins', sans-serif;
            padding: 30px;
        }
        .form-container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #343a40;
        }
        .form-subtitle {
            text-align: center;
            font-size: 18px;
            margin-bottom: 30px;
            color: #6c757d;
        }
        label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #495057;
        }
        input, select, textarea {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px;
        }
        textarea {
            resize: none;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .submit-btn {
            display: block;
            width: 100%;
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: white;
            border: none;
            font-size: 18px;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .submit-btn:hover {
            background: linear-gradient(90deg, #0056b3, #003d7f);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="form-title">{{$siteSettings->name}}</h1>
        <h4 class="form-subtitle">{{$siteSettings->slogan}}</h4>
        <h3 class="text-center mb-4">সদস্য আবেদন ফরম</h3>
        <form>












            <!-- Terms And Conditions -->
            <div class="mb-4">
                <div class="row">
                    @foreach ($TermAndCondition as $key => $termAndCondition)
                        <div class="col-md-12">
                           {{ $key + 1}}. {{ $termAndCondition->title }}
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Questions -->
            <div class="mb-4">
                <div class="row">
                    @foreach ($AdmissionQuestions as $question)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ $question->questions }}</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="question_{{ $question->id }}" value="yes"> হ্যাঁ
                                    </label>
                                    <label class="form-check-label ms-3">
                                        <input class="form-check-input" type="radio" name="question_{{ $question->id }}" value="no"> না
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Personal Details -->
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="member_no">সদস্য নম্বর:</label>
                    <input type="text" id="member_no" name="member_no" value="{{ $members->member_unique_id }}" readonly>
                </div>
                <div class="col-md-4 form-group">
                    <label for="name">নাম:</label>
                    <input type="text" id="name" name="name" value="{{ $members->mem_name }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label for="gender">পুরুষ/মহিলা:</label>
                    <select id="gender" name="gender" required>
                        <option value="Male" {{ $members->mem_gender == 'male' ? 'selected' : '' }}>পুরুষ</option>
                        <option value="Female" {{ $members->mem_gender == 'female' ? 'selected' : '' }}>মহিলা</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="date_of_birth">জন্ম তারিখ:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $members->mem_dob }}" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="current_address">বর্তমান ঠিকানা:</label>
                    <input type="text" id="current_address" name="current_address" value="{{ $members->mem_address }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label for="telephone">টেলিফোন:</label>
                    <input type="text" id="telephone" name="telephone" value="{{ $members->mem_cell }}">
                </div>
                <div class="col-md-4 form-group">
                    <label for="email">ই-মেইল:</label>
                    <input type="email" id="email" name="email" value="{{ $members->mem_email }}">
                </div>

                <!-- Physical Attributes -->
                <div class="col-md-4 form-group">
                    <label for="height">উচ্চতা (সেমি):</label>
                    <input type="number" id="height" name="height" value="{{ $members->height }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label for="weight">ওজন (কেজি):</label>
                    <input type="number" id="weight" name="weight" value="{{ $members->weight }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label for="blood_group">রক্তের গ্রুপ:</label>
                    <input type="text" id="blood_group" name="blood_group" value="{{ $members->blood_group }}">
                </div>
                <div class="col-md-4 form-group">
                    <label for="profession">কর্ম:</label>
                    <input type="text" id="profession" name="profession" value="{{ $members->profession }}">
                </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="submit-btn">জমা দিন</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


