<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDailyWorkoutsRequest;
use App\Http\Requests\UpdateDailyWorkoutsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\DailyWorkouts;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\WorkoutCategory;
use App\Models\Member;



class DailyWorkoutsController extends AppBaseController
{
    /**
     * Display a listing of the DailyWorkouts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $dailyWorkouts = DailyWorkouts::join('members', 'daily_workouts.member_id', '=', 'members.id')
        //     ->join('workout_categorys', 'daily_workouts.workout_category', '=', 'workout_categorys.id')
        //     ->groupBy('daily_workouts.day')
        //     ->select('daily_workouts.*', 'members.mem_name as member_name', 'workout_categorys.title as workout_category_name')
        //     ->paginate(10);
        if (if_can('show_all_data')){
            $member = Member::leftJoin('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
                            ->select('members.*', 'multi_branchs.branch_name')
                            ->get();
        }else{
            $member = Member::leftJoin('multi_branchs', 'members.branch_id', '=', 'multi_branchs.id')
                            ->select('members.*', 'multi_branchs.branch_name')
                            ->where('members.id',auth()->user()->member_id)
                            ->get();
        }
        

        return view('daily_workouts.index')->with('members', $member);
    }

    /**
     * Show the form for creating a new DailyWorkouts.
     *
     * @return Response
     */
    public function create()
    {
        $workoutCategories = WorkoutCategory::paginate(10);
        $member = Member::paginate(10);
        return view('daily_workouts.create')->with('workoutCategories', $workoutCategories)->with('member', $member);
    }

    /**
     * Store a newly created DailyWorkouts in storage.
     *
     * @param CreateDailyWorkoutsRequest $request
     *
     * @return Response
     */
    public function store(CreateDailyWorkoutsRequest $request)
    {
        $input = $request->all();
        $member_id=$input['member_id'];
        $exercise_name=$input['exercise_name'];
        $reputation=$input['reputation'];
        $sets=$input['sets'];
        $duration_minutes=$input['duration_minutes'];
        $workout_category=$input['workout_category'];
        $day=$input['day'];
        $duration=$input['duration'];
        foreach ($input['exercise_name'] as $key => $value) {
            $data_array = array(
                'member_id' => $member_id,
                'day' => $day,
                'duration' => $duration,
                'workout_category' => $workout_category[$key],
                'exercise_name' => $exercise_name[$key],
                'reputation' => $reputation[$key],
                'sets' => $sets[$key],
                'duration_minutes' => $duration_minutes[$key],
                'create_by' => auth()->user()->member_id
            );
            DailyWorkouts::create($data_array);
        }
        Flash::success('Daily Workouts saved successfully.');
        return redirect(route('dailyWorkouts.index'));
    }

    /**
     * Display the specified DailyWorkouts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DailyWorkouts $dailyWorkouts */
        $dailyWorkouts = DailyWorkouts::find($id);

        if (empty($dailyWorkouts)) {
            Flash::error('Daily Workouts not found');

            return redirect(route('dailyWorkouts.index'));
        }

        return view('daily_workouts.show')->with('dailyWorkouts', $dailyWorkouts);
    }

    /**
     * Show the form for editing the specified DailyWorkouts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var DailyWorkouts $dailyWorkouts */
        $dailyWorkouts = DailyWorkouts::find($id);

        if (empty($dailyWorkouts)) {
            Flash::error('Daily Workouts not found');

            return redirect(route('dailyWorkouts.index'));
        }

        return view('daily_workouts.edit')->with('dailyWorkouts', $dailyWorkouts);
    }

    /**
     * Update the specified DailyWorkouts in storage.
     *
     * @param int $id
     * @param UpdateDailyWorkoutsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDailyWorkoutsRequest $request)
    {
        /** @var DailyWorkouts $dailyWorkouts */
        $dailyWorkouts = DailyWorkouts::find($id);

        if (empty($dailyWorkouts)) {
            Flash::error('Daily Workouts not found');

            return redirect(route('dailyWorkouts.index'));
        }

        $dailyWorkouts->fill($request->all());
        $dailyWorkouts->save();

        Flash::success('Daily Workouts updated successfully.');

        return redirect(route('dailyWorkouts.index'));
    }

    /**
     * Remove the specified DailyWorkouts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DailyWorkouts $dailyWorkouts */
        $dailyWorkouts = DailyWorkouts::find($id);

        if (empty($dailyWorkouts)) {
            Flash::error('Daily Workouts not found');

            return redirect(route('dailyWorkouts.index'));
        }

        $dailyWorkouts->delete();

        Flash::success('Daily Workouts deleted successfully.');

        return redirect(route('dailyWorkouts.index'));
    }
    public function getDailyWorkouts(Request $request){
        $member_id=$request->member_id;
        $dailyWorkouts = DailyWorkouts::join('members', 'daily_workouts.member_id', '=', 'members.id')
            ->join('workout_categorys', 'daily_workouts.workout_category', '=', 'workout_categorys.id')
            ->where('daily_workouts.member_id', $member_id)
            ->select(
                'daily_workouts.*',
                'members.mem_name as member_name',
                'workout_categorys.title as workout_category_name'
            )
            ->orderBy('workout_category_name', 'asc')
            ->get();

            $day=[];
            foreach ($dailyWorkouts as $key => $value) {
                $day[$value->day][]=$value;
            }




        if (empty($dailyWorkouts)) {
            return response()->json(['message' => 'No data found'], 404);
        }else{
            $member_details=Member::find($member_id);
            $create_by=Member::find($dailyWorkouts[0]->create_by);
            $data=[
                'dailyWorkouts' => $day,
                'member_details' => $member_details,
                'create_by' => $create_by
            ];
            return response()->json($data, 200);
        }
    }
}
