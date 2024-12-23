<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Group;
use App\Models\GroupPermition;
use Illuminate\Http\Request;
use Flash;
use Response;

class GroupController extends AppBaseController
{
    /**
     * Display a listing of the Group.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Group $groups */
        $groups = Group::paginate(10);

        return view('groups.index')
            ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new Group.
     *
     * @return Response
     */
    public function create()
    {
        $permission_data = array();

        return view('groups.create')->with('permission_data', $permission_data);
    }

    /**
     * Store a newly created Group in storage.
     *
     * @param CreateGroupRequest $request
     *
     * @return Response
     */
    public function store(CreateGroupRequest $request)
    {
        $input = $request->all();

        /** @var Group $group */
        $group = Group::create($input);
        $group_id=$group->id;

        foreach ($input['permissions'] as $permission) {
            GroupPermition::create([
                'group_id' => $group_id,
                'permission_id' => $permission
            ]);
        };

        Flash::success('Group saved successfully.');

        return redirect(route('groups.index'));
    }

    /**
     * Display the specified Group.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Group $group */
        $group = Group::find($id);

        if (empty($group)) {
            Flash::error('Group not found');

            return redirect(route('groups.index'));
        }

        return view('groups.show')->with('group', $group);
    }

    /**
     * Show the form for editing the specified Group.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Group $group */
        $group = Group::find($id);

        if (empty($group)) {
            Flash::error('Group not found');

            return redirect(route('groups.index'));
        }
        $permission_data = GroupPermition::where('group_id', $id)->pluck('permission_id')->toArray();

        return view('groups.edit')->with('group', $group)->with('permission_data', $permission_data);
    }

    /**
     * Update the specified Group in storage.
     *
     * @param int $id
     * @param UpdateGroupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGroupRequest $request)
    {
        /** @var Group $group */
        $group = Group::find($id);
        if (empty($group)) {
            Flash::error('Group not found');
            return redirect(route('groups.index'));
        }
        $group->fill($request->all());
        $group->save();
        GroupPermition::where('group_id', $id)->delete();
        foreach ($request->input('permissions') as $permission) {
            GroupPermition::create([
                'group_id' => $id,
                'permission_id' => $permission
            ]);
        };
        Flash::success('Group updated successfully.');
        return redirect(route('groups.index'));
    }

    /**
     * Remove the specified Group from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Group $group */
        $group = Group::find($id);

        if (empty($group)) {
            Flash::error('Group not found');

            return redirect(route('groups.index'));
        }

        $group->delete();

        Flash::success('Group deleted successfully.');

        return redirect(route('groups.index'));
    }
}
