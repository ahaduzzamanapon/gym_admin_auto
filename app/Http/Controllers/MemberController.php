<?php

namespace App\Http\Controllers;

use App\DataTables\MemberDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Member;
use App\Models\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use File;
use Hash;

class MemberController extends AppBaseController
{
    /**
     * Display a listing of the Member.
     *
     * @param MemberDataTable $memberDataTable
     * @return Response
     */
    public function index(MemberDataTable $memberDataTable)
    {
        return $memberDataTable->render('members.index');
    }

    /**
     * Show the form for creating a new Member.
     *
     * @return Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created Member in storage.
     *
     * @param CreateMemberRequest $request
     *
     * @return Response
     */
    public function store(CreateMemberRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('mem_img_url')) {
            $path = storage_path('app/public/images/members');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('mem_img_url');
            $input['mem_img_url'] = $file->store('images/members', 'public');
        }

        /** @var Member $member */
        $member = Member::create($input);

        User::create(
            [
                'name' => $input['mem_name'],
                'email' => $input['mem_email'],
                'password' => Hash::make('12345678'),
            ]
        );
        Flash::success('Member saved successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Display the specified Member.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Member $member */
        $member = Member::find($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }

        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified Member.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Member $member */
        $member = Member::find($id);

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }


        return view('members.edit')->with('member', $member);
    }

    /**
     * Update the specified Member in storage.
     *
     * @param  int              $id
     * @param UpdateMemberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMemberRequest $request)
    {
        /** @var Member $member */
        $member = Member::find($id);

        $input = $request->all();

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }
        if ($request->hasFile('mem_img_url')) {
            $path = storage_path('app/public/images/members');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('mem_img_url');
            $input['mem_img_url'] = $file->store('images/members', 'public');
        }else{
            unset($input['mem_img_url']);
        }

        $member->fill($input);
        $member->save();

        Flash::success('Member updated successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified Member from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Member $member */
        $member = Member::find($id);
        

        if (empty($member)) {
            Flash::error('Member not found');

            return redirect(route('members.index'));
        }
        $member_email=$member->mem_email;


        $member->delete();

        User::where('email', $member_email)->delete();

        Flash::success('Member deleted successfully.');

        return redirect(route('members.index'));
    }
}
