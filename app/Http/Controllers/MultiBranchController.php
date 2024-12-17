<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMultiBranchRequest;
use App\Http\Requests\UpdateMultiBranchRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\MultiBranch;
use Illuminate\Http\Request;
use Flash;
use Response;

class MultiBranchController extends AppBaseController
{
    /**
     * Display a listing of the MultiBranch.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var MultiBranch $multiBranches */
        $multiBranches = MultiBranch::all();

        return view('multi_branches.index')
            ->with('multiBranches', $multiBranches);
    }

    /**
     * Show the form for creating a new MultiBranch.
     *
     * @return Response
     */
    public function create()
    {
        return view('multi_branches.create');
    }

    /**
     * Store a newly created MultiBranch in storage.
     *
     * @param CreateMultiBranchRequest $request
     *
     * @return Response
     */
    public function store(CreateMultiBranchRequest $request)
    {
        $input = $request->all();

        /** @var MultiBranch $multiBranch */
        $multiBranch = MultiBranch::create($input);

        Flash::success('Multi Branch saved successfully.');

        return redirect(route('multiBranches.index'));
    }

    /**
     * Display the specified MultiBranch.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var MultiBranch $multiBranch */
        $multiBranch = MultiBranch::find($id);

        if (empty($multiBranch)) {
            Flash::error('Multi Branch not found');

            return redirect(route('multiBranches.index'));
        }

        return view('multi_branches.show')->with('multiBranch', $multiBranch);
    }

    /**
     * Show the form for editing the specified MultiBranch.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var MultiBranch $multiBranch */
        $multiBranch = MultiBranch::find($id);

        if (empty($multiBranch)) {
            Flash::error('Multi Branch not found');

            return redirect(route('multiBranches.index'));
        }

        return view('multi_branches.edit')->with('multiBranch', $multiBranch);
    }

    /**
     * Update the specified MultiBranch in storage.
     *
     * @param int $id
     * @param UpdateMultiBranchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMultiBranchRequest $request)
    {
        /** @var MultiBranch $multiBranch */
        $multiBranch = MultiBranch::find($id);

        if (empty($multiBranch)) {
            Flash::error('Multi Branch not found');

            return redirect(route('multiBranches.index'));
        }

        $multiBranch->fill($request->all());
        $multiBranch->save();

        Flash::success('Multi Branch updated successfully.');

        return redirect(route('multiBranches.index'));
    }

    /**
     * Remove the specified MultiBranch from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var MultiBranch $multiBranch */
        $multiBranch = MultiBranch::find($id);

        if (empty($multiBranch)) {
            Flash::error('Multi Branch not found');

            return redirect(route('multiBranches.index'));
        }

        $multiBranch->delete();

        Flash::success('Multi Branch deleted successfully.');

        return redirect(route('multiBranches.index'));
    }
}
