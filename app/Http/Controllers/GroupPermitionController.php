<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupPermitionRequest;
use App\Http\Requests\UpdateGroupPermitionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\GroupPermition;
use Illuminate\Http\Request;
use Flash;
use Response;

class GroupPermitionController extends AppBaseController
{
    /**
     * Display a listing of the GroupPermition.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var GroupPermition $groupPermitions */
        $groupPermitions = GroupPermition::paginate(10);

        return view('group_permitions.index')
            ->with('groupPermitions', $groupPermitions);
    }

    /**
     * Show the form for creating a new GroupPermition.
     *
     * @return Response
     */
    public function create()
    {
        return view('group_permitions.create');
    }

    /**
     * Store a newly created GroupPermition in storage.
     *
     * @param CreateGroupPermitionRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupPermitionRequest $request)
    {
        $input = $request->all();

        /** @var GroupPermition $groupPermition */
        $groupPermition = GroupPermition::create($input);

        Flash::success('Group Permition saved successfully.');

        return redirect(route('groupPermitions.index'));
    }

    /**
     * Display the specified GroupPermition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GroupPermition $groupPermition */
        $groupPermition = GroupPermition::find($id);

        if (empty($groupPermition)) {
            Flash::error('Group Permition not found');

            return redirect(route('groupPermitions.index'));
        }

        return view('group_permitions.show')->with('groupPermition', $groupPermition);
    }

    /**
     * Show the form for editing the specified GroupPermition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var GroupPermition $groupPermition */
        $groupPermition = GroupPermition::find($id);

        if (empty($groupPermition)) {
            Flash::error('Group Permition not found');

            return redirect(route('groupPermitions.index'));
        }

        return view('group_permitions.edit')->with('groupPermition', $groupPermition);
    }

    /**
     * Update the specified GroupPermition in storage.
     *
     * @param int $id
     * @param UpdateGroupPermitionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupPermitionRequest $request)
    {
        /** @var GroupPermition $groupPermition */
        $groupPermition = GroupPermition::find($id);

        if (empty($groupPermition)) {
            Flash::error('Group Permition not found');

            return redirect(route('groupPermitions.index'));
        }

        $groupPermition->fill($request->all());
        $groupPermition->save();

        Flash::success('Group Permition updated successfully.');

        return redirect(route('groupPermitions.index'));
    }

    /**
     * Remove the specified GroupPermition from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GroupPermition $groupPermition */
        $groupPermition = GroupPermition::find($id);

        if (empty($groupPermition)) {
            Flash::error('Group Permition not found');

            return redirect(route('groupPermitions.index'));
        }

        $groupPermition->delete();

        Flash::success('Group Permition deleted successfully.');

        return redirect(route('groupPermitions.index'));
    }
}
