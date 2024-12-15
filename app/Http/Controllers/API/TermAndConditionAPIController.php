<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTermAndConditionAPIRequest;
use App\Http\Requests\API\UpdateTermAndConditionAPIRequest;
use App\Models\TermAndCondition;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TermAndConditionResource;
use Response;

/**
 * Class TermAndConditionController
 * @package App\Http\Controllers\API
 */

class TermAndConditionAPIController extends AppBaseController
{
    /**
     * Display a listing of the TermAndCondition.
     * GET|HEAD /termAndConditions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = TermAndCondition::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $termAndConditions = $query->get();

        return $this->sendResponse(TermAndConditionResource::collection($termAndConditions), 'Terms And Conditions retrieved successfully');
    }

    /**
     * Store a newly created TermAndCondition in storage.
     * POST /termAndConditions
     *
     * @param CreateTermAndConditionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTermAndConditionAPIRequest $request)
    {
        $input = $request->all();

        /** @var TermAndCondition $termAndCondition */
        $termAndCondition = TermAndCondition::create($input);

        return $this->sendResponse(new TermAndConditionResource($termAndCondition), 'Term And Condition saved successfully');
    }

    /**
     * Display the specified TermAndCondition.
     * GET|HEAD /termAndConditions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TermAndCondition $termAndCondition */
        $termAndCondition = TermAndCondition::find($id);

        if (empty($termAndCondition)) {
            return $this->sendError('Term And Condition not found');
        }

        return $this->sendResponse(new TermAndConditionResource($termAndCondition), 'Term And Condition retrieved successfully');
    }

    /**
     * Update the specified TermAndCondition in storage.
     * PUT/PATCH /termAndConditions/{id}
     *
     * @param int $id
     * @param UpdateTermAndConditionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTermAndConditionAPIRequest $request)
    {
        /** @var TermAndCondition $termAndCondition */
        $termAndCondition = TermAndCondition::find($id);

        if (empty($termAndCondition)) {
            return $this->sendError('Term And Condition not found');
        }

        $termAndCondition->fill($request->all());
        $termAndCondition->save();

        return $this->sendResponse(new TermAndConditionResource($termAndCondition), 'TermAndCondition updated successfully');
    }

    /**
     * Remove the specified TermAndCondition from storage.
     * DELETE /termAndConditions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TermAndCondition $termAndCondition */
        $termAndCondition = TermAndCondition::find($id);

        if (empty($termAndCondition)) {
            return $this->sendError('Term And Condition not found');
        }

        $termAndCondition->delete();

        return $this->sendSuccess('Term And Condition deleted successfully');
    }
}
