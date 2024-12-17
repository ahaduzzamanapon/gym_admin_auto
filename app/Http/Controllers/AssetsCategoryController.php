<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAssetsCategoryRequest;
use App\Http\Requests\UpdateAssetsCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AssetsCategory;
use Illuminate\Http\Request;
use Flash;
use Response;

class AssetsCategoryController extends AppBaseController
{
    /**
     * Display a listing of the AssetsCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AssetsCategory $assetsCategories */
        $assetsCategories = AssetsCategory::all();

        return view('assets_categories.index')
            ->with('assetsCategories', $assetsCategories);
    }

    /**
     * Show the form for creating a new AssetsCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('assets_categories.create');
    }

    /**
     * Store a newly created AssetsCategory in storage.
     *
     * @param CreateAssetsCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateAssetsCategoryRequest $request)
    {
        $input = $request->all();

        /** @var AssetsCategory $assetsCategory */
        $assetsCategory = AssetsCategory::create($input);

        Flash::success('Assets Categories saved successfully.');

        return redirect(route('assetsCategories.index'));
    }

    /**
     * Display the specified AssetsCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AssetsCategory $assetsCategory */
        $assetsCategory = AssetsCategory::find($id);

        if (empty($assetsCategory)) {
            Flash::error('Assets Categories not found');

            return redirect(route('assetsCategories.index'));
        }

        return view('assets_categories.show')->with('assetsCategory', $assetsCategory);
    }

    /**
     * Show the form for editing the specified AssetsCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AssetsCategory $assetsCategory */
        $assetsCategory = AssetsCategory::find($id);

        if (empty($assetsCategory)) {
            Flash::error('Assets Categories not found');

            return redirect(route('assetsCategories.index'));
        }

        return view('assets_categories.edit')->with('assetsCategory', $assetsCategory);
    }

    /**
     * Update the specified AssetsCategory in storage.
     *
     * @param int $id
     * @param UpdateAssetsCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssetsCategoryRequest $request)
    {
        /** @var AssetsCategory $assetsCategory */
        $assetsCategory = AssetsCategory::find($id);

        if (empty($assetsCategory)) {
            Flash::error('Assets Categories not found');

            return redirect(route('assetsCategories.index'));
        }

        $assetsCategory->fill($request->all());
        $assetsCategory->save();

        Flash::success('Assets Categories updated successfully.');

        return redirect(route('assetsCategories.index'));
    }

    /**
     * Remove the specified AssetsCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AssetsCategory $assetsCategory */
        $assetsCategory = AssetsCategory::find($id);

        if (empty($assetsCategory)) {
            Flash::error('Assets Categories not found');

            return redirect(route('assetsCategories.index'));
        }

        $assetsCategory->delete();

        Flash::success('Assets Categories deleted successfully.');

        return redirect(route('assetsCategories.index'));
    }
}
