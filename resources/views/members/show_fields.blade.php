<tr>
    <th scope="row">{!! Form::label('id', 'Id:') !!}</th>
    <td>{{ $member->id }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('member_unique_id', 'Member Unique Id:') !!}</th>
    <td>{{ $member->member_unique_id }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_name', 'Member Name:') !!}</th>
    <td>{{ $member->mem_name }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_father', 'Member Father:') !!}</th>
    <td>{{ $member->mem_father }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_mother', 'Member Mother:') !!}</th>
    <td>{{ $member->mem_mother }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_gender', 'Member Gender:') !!}</th>
    <td>{{ $member->mem_gender }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_address', 'Member Address:') !!}</th>
    <td>{{ $member->mem_address }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_admission_date', 'Member Admission Date:') !!}</th>
    <td>{{ $member->mem_admission_date }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('date_of_birth', 'Date Of Birth:') !!}</th>
    <td>{{ $member->date_of_birth }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_cell', 'Member Cell:') !!}</th>
    <td>{{ $member->mem_cell }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_email', 'Member Email:') !!}</th>
    <td>{{ $member->mem_email }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_img_url', 'Member Img Url:') !!}</th>
    <td>{{ $member->mem_img_url }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('mem_type', 'Member Type:') !!}</th>
    <td>{{ $member->mem_type }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('punch_id', 'Punch Id:') !!}</th>
    <td>{{ $member->punch_id }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('height', 'Height:') !!}</th>
    <td>{{ $member->height }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('weight', 'Weight:') !!}</th>
    <td>{{ $member->weight }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('bmi', 'Bmi:') !!}</th>
    <td>{{ $member->bmi }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('waist', 'Waist:') !!}</th>
    <td>{{ $member->waist }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('blood_group', 'Blood Group:') !!}</th>
    <td>{{ $member->blood_group }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('blood_pressure', 'Blood Pressure:') !!}</th>
    <td>{{ $member->blood_pressure }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('pulse_rate', 'Pulse Rate:') !!}</th>
    <td>{{ $member->pulse_rate }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('profession', 'Profession:') !!}</th>
    <td>{{ $member->profession }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('office_address', 'Office Address:') !!}</th>
    <td>{{ $member->office_address }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('exercise_goal', 'Exercise Goal:') !!}</th>
    <td>{{ $member->exercise_goal }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('current_diet_routine', 'Current Diet Routine:') !!}</th>
    <td>{{ $member->current_diet_routine }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('sassoon_exercise_time', 'Sassoon Exercise Time:') !!}</th>
    <td>{{ $member->sassoon_exercise_time }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('sleep_time', 'Sleep Time:') !!}</th>
    <td>{{ $member->sleep_time }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('wake_up_time', 'Wake Up Time:') !!}</th>
    <td>{{ $member->wake_up_time }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('work_time', 'Work Time:') !!}</th>
    <td>{{ $member->work_time }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('exercise_history', 'Exercise History:') !!}</th>
    <td>{{ $member->exercise_history }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('medicine_history', 'Medicine History:') !!}</th>
    <td>{{ $member->medicine_history }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('injury_or_health_issue', 'Injury Or Health Issue:') !!}</th>
    <td>{{ $member->injury_or_health_issue }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('like_or_dislike_exercise', 'Like Or Dislike Exercise:') !!}</th>
    <td>{{ $member->like_or_dislike_exercise }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('like_or_dislike_food', 'Like Or Dislike Food:') !!}</th>
    <td>{{ $member->like_or_dislike_food }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('push_up_count', 'Push Up Count:') !!}</th>
    <td>{{ $member->push_up_count }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('pull_up_count', 'Pull Up Count:') !!}</th>
    <td>{{ $member->pull_up_count }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('lift_count_kg', 'Lift Count Kg:') !!}</th>
    <td>{{ $member->lift_count_kg }}</td>
</tr>
<tr>
    <th scope="row">{!! Form::label('question', 'Question:') !!}</th>
    <td>
        <table>
            <thead>
                    <tr> <th>Question</th> <th>Answer</th> </tr>
            </thead>
            <tbody>
                @if(is_array(json_decode($member->question, true)) || is_object(json_decode($member->question, true)))
                    @foreach (json_decode($member->question, true) as $questionId => $answer)
                        <tr>
                            <td>{{ $questions->firstWhere('id', $questionId)->questions ?? 'N/A' }}</td>
                            <td>{{ $answer }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">No questions available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </td>
</tr>
<tr>
    <th scope="row">{!! Form::label('term_con', 'Term Con:') !!}</th>
    <td>{{ $member->term_con }}</td>
</tr>


