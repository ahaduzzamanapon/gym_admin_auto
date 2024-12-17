<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssetsManagementRequest;
use App\Http\Requests\UpdateAssetsManagementRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AssetsManagement;
use App\Models\AssetsCategory;
use Illuminate\Http\Request;
use Flash;
use Response;

class AssetsManagementController extends AppBaseController
{
    /**
     * Display a listing of the AssetsManagement.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AssetsManagement $assetsManagements */
        $assetsManagements = AssetsManagement::join('multi_branchs', 'assets_managements.branch_id', '=', 'multi_branchs.id')
        ->select('assets_managements.*', 'multi_branchs.branch_name as branch_name')
        ->get();

        return view('assets_managements.index')
            ->with('assetsManagements', $assetsManagements);
    }

    /**
     * Show the form for creating a new AssetsManagement.
     *
     * @return Response
     */
    public function create()
    {
        return view('assets_managements.create');
    }

    /**
     * Store a newly created AssetsManagement in storage.
     *
     * @param CreateAssetsManagementRequest $request
     *
     * @return Response
     */
    public function store(CreateAssetsManagementRequest $request)
    {
        $input = $request->all();

        /** @var AssetsManagement $assetsManagement */
        $assetsManagement = AssetsManagement::create($input);

        Flash::success('Assets Management saved successfully.');

        return redirect(route('assetsManagements.index'));
    }

    /**
     * Display the specified AssetsManagement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AssetsManagement $assetsManagement */
        $assetsManagement = AssetsManagement::find($id);

        if (empty($assetsManagement)) {
            Flash::error('Assets Management not found');

            return redirect(route('assetsManagements.index'));
        }

        return view('assets_managements.show')->with('assetsManagement', $assetsManagement);
    }

    /**
     * Show the form for editing the specified AssetsManagement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AssetsManagement $assetsManagement */
        $assetsManagement = AssetsManagement::find($id);

        if (empty($assetsManagement)) {
            Flash::error('Assets Management not found');

            return redirect(route('assetsManagements.index'));
        }

        return view('assets_managements.edit')->with('assetsManagement', $assetsManagement);
    }

    /**
     * Update the specified AssetsManagement in storage.
     *
     * @param int $id
     * @param UpdateAssetsManagementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssetsManagementRequest $request)
    {
        /** @var AssetsManagement $assetsManagement */
        $assetsManagement = AssetsManagement::find($id);

        if (empty($assetsManagement)) {
            Flash::error('Assets Management not found');

            return redirect(route('assetsManagements.index'));
        }

        $assetsManagement->fill($request->all());
        $assetsManagement->save();

        Flash::success('Assets Management updated successfully.');

        return redirect(route('assetsManagements.index'));
    }

    /**
     * Remove the specified AssetsManagement from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AssetsManagement $assetsManagement */
        $assetsManagement = AssetsManagement::find($id);

        if (empty($assetsManagement)) {
            Flash::error('Assets Management not found');

            return redirect(route('assetsManagements.index'));
        }

        $assetsManagement->delete();

        Flash::success('Assets Management deleted successfully.');

        return redirect(route('assetsManagements.index'));
    }
}
