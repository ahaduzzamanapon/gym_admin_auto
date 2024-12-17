<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdmissionQuestionsRequest;
use App\Http\Requests\UpdateAdmissionQuestionsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AdmissionQuestions;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdmissionQuestionsController extends AppBaseController
{
    /**
     * Display a listing of the AdmissionQuestions.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AdmissionQuestions $admissionQuestions */
        $admissionQuestions = AdmissionQuestions::all();

        return view('admission_questions.index')
            ->with('admissionQuestions', $admissionQuestions);
    }

    /**
     * Show the form for creating a new AdmissionQuestions.
     *
     * @return Response
     */
    public function create()
    {
        return view('admission_questions.create');
    }

    /**
     * Store a newly created AdmissionQuestions in storage.
     *
     * @param CreateAdmissionQuestionsRequest $request
     *
     * @return Response
     */
    public function store(CreateAdmissionQuestionsRequest $request)
    {
        $input = $request->all();

        /** @var AdmissionQuestions $admissionQuestions */
        $admissionQuestions = AdmissionQuestions::create($input);

        Flash::success('Admission Questions saved successfully.');

        return redirect(route('admissionQuestions.index'));
    }

    /**
     * Display the specified AdmissionQuestions.
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
            Flash::error('Admission Questions not found');

            return redirect(route('admissionQuestions.index'));
        }

        return view('admission_questions.show')->with('admissionQuestions', $admissionQuestions);
    }

    /**
     * Show the form for editing the specified AdmissionQuestions.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AdmissionQuestions $admissionQuestions */
        $admissionQuestions = AdmissionQuestions::find($id);

        if (empty($admissionQuestions)) {
            Flash::error('Admission Questions not found');

            return redirect(route('admissionQuestions.index'));
        }

        return view('admission_questions.edit')->with('admissionQuestions', $admissionQuestions);
    }

    /**
     * Update the specified AdmissionQuestions in storage.
     *
     * @param int $id
     * @param UpdateAdmissionQuestionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdmissionQuestionsRequest $request)
    {
        /** @var AdmissionQuestions $admissionQuestions */
        $admissionQuestions = AdmissionQuestions::find($id);

        if (empty($admissionQuestions)) {
            Flash::error('Admission Questions not found');

            return redirect(route('admissionQuestions.index'));
        }

        $admissionQuestions->fill($request->all());
        $admissionQuestions->save();

        Flash::success('Admission Questions updated successfully.');

        return redirect(route('admissionQuestions.index'));
    }

    /**
     * Remove the specified AdmissionQuestions from storage.
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
            Flash::error('Admission Questions not found');

            return redirect(route('admissionQuestions.index'));
        }

        $admissionQuestions->delete();

        Flash::success('Admission Questions deleted successfully.');

        return redirect(route('admissionQuestions.index'));
    }
}
