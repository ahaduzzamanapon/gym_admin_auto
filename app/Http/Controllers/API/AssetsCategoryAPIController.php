<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAssetsCategoryAPIRequest;
use App\Http\Requests\API\UpdateAssetsCategoryAPIRequest;
use App\Models\AssetsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AssetsCategoryResource;
use Response;

/**
 * Class AssetsCategoryController
 * @package App\Http\Controllers\API
 */

class AssetsCategoryAPIController extends AppBaseController
{
    /**
     * Display a listing of the AssetsCategory.
     * GET|HEAD /assetsCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = AssetsCategory::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $assetsCategories = $query->get();

        return $this->sendResponse(AssetsCategoryResource::collection($assetsCategories), 'Assets Categories retrieved successfully');
    }

    /**
     * Store a newly created AssetsCategory in storage.
     * POST /assetsCategories
     *
     * @param CreateAssetsCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAssetsCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var AssetsCategory $assetsCategory */
        $assetsCategory = AssetsCategory::create($input);

        return $this->sendResponse(new AssetsCategoryResource($assetsCategory), 'Assets Categories saved successfully');
    }

    /**
     * Display the specified AssetsCategory.
     * GET|HEAD /assetsCategories/{id}
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
            return $this->sendError('Assets Categories not found');
        }

        return $this->sendResponse(new AssetsCategoryResource($assetsCategory), 'Assets Categories retrieved successfully');
    }

    /**
     * Update the specified AssetsCategory in storage.
     * PUT/PATCH /assetsCategories/{id}
     *
     * @param int $id
     * @param UpdateAssetsCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAssetsCategoryAPIRequest $request)
    {
        /** @var AssetsCategory $assetsCategory */
        $assetsCategory = AssetsCategory::find($id);

        if (empty($assetsCategory)) {
            return $this->sendError('Assets Categories not found');
        }

        $assetsCategory->fill($request->all());
        $assetsCategory->save();

        return $this->sendResponse(new AssetsCategoryResource($assetsCategory), 'AssetsCategory updated successfully');
    }

    /**
     * Remove the specified AssetsCategory from storage.
     * DELETE /assetsCategories/{id}
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
            return $this->sendError('Assets Categories not found');
        }

        $assetsCategory->delete();

        return $this->sendSuccess('Assets Categories deleted successfully');
    }
}
