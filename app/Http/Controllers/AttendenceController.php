<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttendenceRequest;
use App\Http\Requests\UpdateAttendenceRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Attendence;
use Illuminate\Http\Request;
use Flash;
use Response;
// use Request;

class AttendenceController extends AppBaseController
{
    /**
     * Display a listing of the Attendence.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       
        $attendenceTotals = Attendence::selectRaw('
            SUM(CASE WHEN status = "Present" AND member_type = "member" THEN 1 ELSE 0 END) AS present_members,
            SUM(CASE WHEN status = "Present" AND member_type = "staff" THEN 1 ELSE 0 END) AS present_staff,
            SUM(CASE WHEN status = "Absent" AND member_type = "member" THEN 1 ELSE 0 END) AS absent_members,
            SUM(CASE WHEN status = "Absent" AND member_type = "staff" THEN 1 ELSE 0 END) AS absent_staff,
            date

        ')
        ->groupBy('date')
        ->paginate(10);

        return view('attendences.index')
            ->with('attendences', $attendenceTotals);
    }

    /**
     * Show the form for creating a new Attendence.
     *
     * @return Response
     */
    public function create()
    {
        return view('attendences.create');
    }

    /**
     * Store a newly created Attendence in storage.
     *
     * @param CreateAttendenceRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        Attendence::where('date', $input['date'])->delete();


        foreach ($input['member_id'] as $key => $value) {
            $data_array = array(
                'date' => $input['date'],
                'member_id' => $input['member_id'][$key],
                'member_type' => $input['member_type'][$key],
                'status' => $input['status'][$key],
            );
            Attendence::insert($data_array);
        }
        Flash::success('Attendance saved successfully.');
        return redirect(route('attendences.index'));
    }

    /**
     * Display the specified Attendence.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($date)
    {
        /** @var Attendence $attendence */
        $attendence = Attendence::where('date', $date)->get();

        if (empty($attendence)) {
            Flash::error('Attendence not found');

            return redirect(route('attendences.index'));
        }

        return view('attendences.show')->with('attendence', $attendence);
    }

    /**
     * Show the form for editing the specified Attendence.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($date)
    {
        /** @var Attendence $attendence */


        $members = Attendence::select('attendences.id','attendences.date','attendences.member_id','attendences.status','members.mem_name')
        ->join('members', 'members.id', '=', 'attendences.member_id')
        ->where('member_type', 'member')
        ->where('date', $date)
        ->get();

        $staffMembers = Attendence::select('attendences.id','attendences.date','attendences.member_id','attendences.status','members.mem_name')
        ->join('members', 'members.id', '=', 'attendences.member_id')
        ->where('member_type', 'staff')
        ->where('date', $date)
        ->get();
        //dd($staffMembers);

       
        return view('attendences.edit', compact('members', 'staffMembers', 'date'));
    }

    /**
     * Update the specified Attendence in storage.
     *
     * @param int $id
     * @param UpdateAttendenceRequest $request
     *
     * @return Response
     */
    public function update($date, Request $request)
    {
        $input = $request->all();
        /** @var Attendence $attendence */
        Attendence::where('date', $date)->delete();

        foreach ($input['member_id'] as $key => $value) {
            $data_array = array(
                'date' => $input['date'],
                'member_id' => $input['member_id'][$key],
                'member_type' => $input['member_type'][$key],
                'status' => $input['status'][$key],
            );
            Attendence::insert($data_array);
        }

      


        Flash::success('Attendence updated successfully.');

        return redirect(route('attendences.index'));
    }

    /**
     * Remove the specified Attendence from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($date)
    {
        /** @var Attendence $attendence */
        $attendence = Attendence::where('date', $date)->get();

        if (empty($attendence)) {
            Flash::error('Attendence not found');

            return redirect(route('attendences.index'));
        }

        $attendence->delete();

        Flash::success('Attendence deleted successfully.');

        return redirect(route('attendences.index'));
    }
}
