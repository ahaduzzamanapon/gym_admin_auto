<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttendenceRequest;
use App\Http\Requests\UpdateAttendenceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Attendence;
use App\Models\Punch_model;
use App\Models\Member;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB; 



class AttendenceController extends AppBaseController
{
    public function index()
    {
        return view('attendences.index');
    }
    public function process_attendence(Request $req)
    {
        $date= date('Y-m-d', strtotime($req->date));
        $first_date=date('Y-m-d 00:00:00', strtotime($req->date));
        $last_date=date('Y-m-d 23:59:59', strtotime($req->date));
        $Member = Member::all();
        foreach ($Member as $key => $value) {
            $prev_data= Attendence::where('date',$date)->where('member_id', $value->id)->first();
            $punch = Punch_model::whereBetween('punch_time', [$first_date, $last_date])
                ->where('punch_id', $value->punch_id)
                ->orderBy('punch_time')
                ->get();
            $firstPunch = $punch->first();
            $lastPunch = $punch->last();
            if (!empty($firstPunch)) {
                if (!$firstPunch->id==$lastPunch->id) {
                   $in_time = date('H:i:s', strtotime($firstPunch->punch_time));
                   $out_time =null;
                }else{
                    $in_time = date('H:i:s', strtotime($firstPunch->punch_time));
                    $out_time = date('H:i:s', strtotime($lastPunch->punch_time));
                }
                //dd($punch);
                if(!empty($prev_data)){
                    $attendance = Attendence::find($prev_data->id);
                    $attendance->date = date('Y-m-d', strtotime($date));
                    $attendance->member_id = $value->id;
                    $attendance->member_type = $value->mem_type==null?'':$value->mem_type;
                    $attendance->in_time = $in_time;
                    $attendance->out_time = $out_time;
                    $attendance->attendence_status = 'Present';
                    $attendance->status = 'Present';
                    $attendance->save();
                }else{
                    $attendance = new Attendence();
                    $attendance->date = date('Y-m-d', strtotime($date));
                    $attendance->member_id = $value->id;
                    $attendance->member_type = $value->mem_type==null?'':$value->mem_type;
                    $attendance->in_time = $in_time;
                    $attendance->out_time = $out_time;
                    $attendance->attendence_status = 'Present';
                    $attendance->status = 'Present';
                    $attendance->save();
                }
            }else{
                if(empty($prev_data)){
                    $attendance = new Attendence();
                    $attendance->date = date('Y-m-d', strtotime($date));
                    $attendance->member_id = $value->id;
                    $attendance->member_type = $value->mem_type==null?'':$value->mem_type;
                    $attendance->in_time = null;
                    $attendance->out_time = null;
                    $attendance->attendence_status = 'Absent';
                    $attendance->status = 'Absent';
                    $attendance->save();
                }
            }
        }

        return response()->json(['message' => 'Attendance Processed Successfully'], 200);
    }
    public function process_attendence_own($date,$punch_id)
    {
        $date= date('Y-m-d', strtotime($date));
        $first_date=date('Y-m-d 00:00:00', strtotime($date));
        $last_date=date('Y-m-d 23:59:59', strtotime($date));
        $Member = Member::where('punch_id', $punch_id)->get();
        foreach ($Member as $key => $value) {
            $prev_data= Attendence::where('date',$date)->where('member_id', $value->id)->first();
            $punch = Punch_model::whereBetween('punch_time', [$first_date, $last_date])
                ->where('punch_id', $value->punch_id)
                ->orderBy('punch_time')
                ->get();
            $firstPunch = $punch->first();
            $lastPunch = $punch->last();
            if (!empty($firstPunch)) {
                if (!$firstPunch->id==$lastPunch->id) {
                   $in_time = date('H:i:s', strtotime($firstPunch->punch_time));
                   $out_time =null;
                }else{
                    $in_time = date('H:i:s', strtotime($firstPunch->punch_time));
                    $out_time = date('H:i:s', strtotime($lastPunch->punch_time));
                }
                //dd($punch);
                if(!empty($prev_data)){
                    $attendance = Attendence::find($prev_data->id);
                    $attendance->date = date('Y-m-d', strtotime($date));
                    $attendance->member_id = $value->id;
                    $attendance->member_type = $value->mem_type;
                    $attendance->in_time = $in_time;
                    $attendance->out_time = $out_time;
                    $attendance->attendence_status = 'Present';
                    $attendance->status = 'Present';
                    $attendance->save();
                }else{
                    $attendance = new Attendence();
                    $attendance->date = date('Y-m-d', strtotime($date));
                    $attendance->member_id = $value->id;
                    $attendance->member_type = $value->mem_type;
                    $attendance->in_time = $in_time;
                    $attendance->out_time = $out_time;
                    $attendance->attendence_status = 'Present';
                    $attendance->status = 'Present';
                    $attendance->save();
                }
            }else{
                if(empty($prev_data)){
                    $attendance = new Attendence();
                    $attendance->date = date('Y-m-d', strtotime($date));
                    $attendance->member_id = $value->id;
                    $attendance->member_type = $value->mem_type;
                    $attendance->in_time = null;
                    $attendance->out_time = null;
                    $attendance->attendence_status = 'Absent';
                    $attendance->status = 'Absent';
                    $attendance->save();
                }
            }
        }

        return response()->json(['message' => 'Attendance Processed Successfully'], 200);
    }
    public function get_member(Request $request)
    {
        $membersQuery = Member::query();
        if ($request->member_type !== '' && $request->member_type !== null) {
            $membersQuery->where('mem_type', $request->member_type);
        }
        if ($request->branch_id !== '' && $request->branch_id !== null) {
           // dd($request->branch_id);
            $membersQuery->where('branch_id', $request->branch_id);
        }
        $member = $membersQuery->get();
        return response()->json(['member' => $member], 200);
    }

    public function get_daily_attendence(Request $request)
    {

        $targetDate = $request->input('from_date');
        $attendanceStatus = $request->input('status');
        $memberIds = $request->input('member_id');

        $attendencesQuery = Attendence::whereDate('date', $targetDate)
            ->join('members', 'attendences.member_id', '=', 'members.id')
            ->whereIn('members.id', $memberIds);

        if ($attendanceStatus !== 'All') {
            $attendencesQuery->where('attendences.status', $attendanceStatus);
        }

        $attendences = $attendencesQuery->get();
        if ($attendanceStatus == 'All') {
            $title = 'Attendence Report';
        }else{
            $title = 'Attendence (' . $attendanceStatus . ') Report  ';
        }

        $data=[
            'date'=>$targetDate,
            'status'=>true,
            'view'=>view('attendences.report.get_daily_attendence_view',compact('attendences','title','targetDate'))->render()
        ];
        
        return response()->json($data, 200);
    }
    public function auto_from_machine(Request $request){
        try {
            $data = $request->all();
            $punch = new Punch_model();
            $punch->punch_id = $data['member_id'];
            $punch->punch_time = date('Y-m-d H:i:s', strtotime($data['timestamp']));
            $punch->process_status = '0';
            $punch->save();
            $date = date('Y-m-d', strtotime($data['timestamp']));
            $punch_id = $data['member_id'];
            $this->process_attendence_own($date,$punch_id);
            return response()->json(['message' => 'Attendance Processed Successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error processing attendance', 'error' => $e->getMessage()], 500);
        }
        
    }
}
