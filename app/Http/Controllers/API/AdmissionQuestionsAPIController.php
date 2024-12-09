<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAdmissionQuestionsAPIRequest;
use App\Http\Requests\API\UpdateAdmissionQuestionsAPIRequest;
use App\Models\AdmissionQuestions;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AdmissionQuestionsResource;
use Response;

/**
 * Class AdmissionQuestionsController
 * @package App\Http\Controllers\API
 */

class AdmissionQuestionsAPIController extends AppBaseController
{
    /**
     * Display a listing of the AdmissionQuestions.
     * GET|HEAD /admissionQuestions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = AdmissionQuestions::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $admissionQuestions = $query->get();

        return $this->sendResponse(AdmissionQuestionsResource::collection($admissionQuestions), 'Admission Questions retrieved successfully');
    }

    /**
     * Store a newly created AdmissionQuestions in storage.
     * POST /admissionQuestions
     *
     * @param CreateAdmissionQuestionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAdmissionQuestionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var AdmissionQuestions $admissionQuestions */
        $admissionQuestions = AdmissionQuestions::create($input);

        return $this->sendResponse(new AdmissionQuestionsResource($admissionQuestions), 'Admission Questions saved successfully');
    }

    /**
     * Display the specified AdmissionQuestions.
     * GET|HEAD /admissionQuestions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AdmissionQuestions $admissionQuestions */
        $admissionQuestions = AdmissionQuestions::find($id);

        if (empty($admissionQuestions)) {
            return $this->sendError('Admission Questions not found');
        }

        return $this->sendResponse(new AdmissionQuestionsResource($admissionQuestions), 'Admission Questions retrieved successfully');
    }

    /**
     * Update the specified AdmissionQuestions in storage.
     * PUT/PATCH /admissionQuestions/{id}
     *
     * @param int $id
     * @param UpdateAdmissionQuestionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdmissionQuestionsAPIRequest $request)
    {
        /** @var AdmissionQuestions $admissionQuestions */
        $admissionQuestions = AdmissionQuestions::find($id);

        if (empty($admissionQuestions)) {
            return $this->sendError('Admission Questions not found');
        }

        $admissionQuestions->fill($request->all());
        $admissionQuestions->save();

        return $this->sendResponse(new AdmissionQuestionsResource($admissionQuestions), 'AdmissionQuestions updated successfully');
    }

    /**
     * Remove the specified AdmissionQuestions from storage.
     * DELETE /admissionQuestions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AdmissionQuestions $admissionQuestions */
        $admissionQuestions = AdmissionQuestions::find($id);

        if (empty($admissionQuestions)) {
            return $this->sendError('Admission Questions not found');
        }

        $admissionQuestions->delete();

        return $this->sendSuccess('Admission Questions deleted successfully');
    }
}
