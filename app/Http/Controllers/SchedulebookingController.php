<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchedulebookingRequest;
use App\Http\Requests\UpdateSchedulebookingRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Schedulebooking;
use Illuminate\Http\Request;
use Flash;
use Response;

class SchedulebookingController extends AppBaseController
{
    /**
     * Display a listing of the Schedulebooking.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Schedulebooking $schedulebookings */
        if(if_can('show_all_data')){
            $schedulebookings = Schedulebooking::select('schedulebookings.*','schedulebookings.id as schedulebooking_id', 'members.mem_name as mem_name', 'assets_managements.item_name as item_name')
            ->join('members', 'members.id', '=', 'schedulebookings.member_id')
            ->join('assets_managements', 'assets_managements.id', '=', 'schedulebookings.asset_id')
            ->get();
        }else{
            $schedulebookings = Schedulebooking::select('schedulebookings.*','schedulebookings.id as schedulebooking_id', 'members.mem_name as mem_name', 'assets_managements.item_name as item_name')
            ->join('members', 'members.id', '=', 'schedulebookings.member_id')
            ->join('assets_managements', 'assets_managements.id', '=', 'schedulebookings.asset_id')
            ->where('members.id', auth()->user()->member_id)
            ->paginate(10);
        }
        return view('schedulebookings.index')
            ->with('schedulebookings', $schedulebookings);
    }

    /**
     * Show the form for creating a new Schedulebooking.
     *
     * @return Response
     */
    public function create()
    {
        return view('schedulebookings.create');
    }

    /**
     * Store a newly created Schedulebooking in storage.
     *
     * @param CreateSchedulebookingRequest $request
     *
     * @return Response
     */
    public function store(CreateSchedulebookingRequest $request)
    {
        $input = $request->all();
        /** @var Schedulebooking $schedulebooking */
        $schedulebooking = Schedulebooking::create($input);
        Flash::success('Schedulebooking saved successfully.');
        return redirect(route('schedulebookings.index'));
    }

    /**
     * Display the specified Schedulebooking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Schedulebooking $schedulebooking */
        $schedulebooking = Schedulebooking::select('schedulebookings.*', 'members.mem_name as mem_name')
        ->join('members', 'members.id', '=', 'schedulebookings.member_id')->find($id);
        // dd($schedulebooking);

        if (empty($schedulebooking)) {
            Flash::error('Schedulebooking not found');

            return redirect(route('schedulebookings.index'));
        }

        return view('schedulebookings.show')->with('schedulebooking', $schedulebooking);
    }

    /**
     * Show the form for editing the specified Schedulebooking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Schedulebooking $schedulebooking */
        $schedulebooking = Schedulebooking::find($id);

        if (empty($schedulebooking)) {
            Flash::error('Schedulebooking not found');

            return redirect(route('schedulebookings.index'));
        }

        return view('schedulebookings.edit')->with('schedulebooking', $schedulebooking);
    }

    /**
     * Update the specified Schedulebooking in storage.
     *
     * @param int $id
     * @param UpdateSchedulebookingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSchedulebookingRequest $request)
    {
        /** @var Schedulebooking $schedulebooking */
        $schedulebooking = Schedulebooking::find($id);

        if (empty($schedulebooking)) {
            Flash::error('Schedulebooking not found');

            return redirect(route('schedulebookings.index'));
        }

        $schedulebooking->fill($request->all());
        $schedulebooking->save();

        Flash::success('Schedulebooking updated successfully.');

        return redirect(route('schedulebookings.index'));
    }

    /**
     * Remove the specified Schedulebooking from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Schedulebooking $schedulebooking */
        $schedulebooking = Schedulebooking::find($id);

        if (empty($schedulebooking)) {
            Flash::error('Schedulebooking not found');

            return redirect(route('schedulebookings.index'));
        }

        $schedulebooking->delete();

        Flash::success('Schedulebooking deleted successfully.');

        return redirect(route('schedulebookings.index'));
    }
}
