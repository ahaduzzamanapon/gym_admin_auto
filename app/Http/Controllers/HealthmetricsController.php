<?php

namespace App\Http\Controllers;

use App\DataTables\HealthmetricsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHealthmetricsRequest;
use App\Http\Requests\UpdateHealthmetricsRequest;
use App\Models\Healthmetrics;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HealthmetricsController extends AppBaseController
{
    /**
     * Display a listing of the Healthmetrics.
     *
     * @param HealthmetricsDataTable $healthmetricsDataTable
     * @return Response
     */
    public function index(HealthmetricsDataTable $healthmetricsDataTable)
    {
        return $healthmetricsDataTable->render('healthmetrics.index');
    }

    /**
     * Show the form for creating a new Healthmetrics.
     *
     * @return Response
     */
    public function create()
    {
        return view('healthmetrics.create');
    }

    /**
     * Store a newly created Healthmetrics in storage.
     *
     * @param CreateHealthmetricsRequest $request
     *
     * @return Response
     */
    public function store(CreateHealthmetricsRequest $request)
    {
        $input = $request->all();

        /** @var Healthmetrics $healthmetrics */
        $healthmetrics = Healthmetrics::create($input);

        Flash::success('Healthmetrics saved successfully.');

        return redirect(route('healthmetrics.index'));
    }

    /**
     * Display the specified Healthmetrics.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Healthmetrics $healthmetrics */
        $healthmetrics = Healthmetrics::find($id);

        if (empty($healthmetrics)) {
            Flash::error('Healthmetrics not found');

            return redirect(route('healthmetrics.index'));
        }

        return view('healthmetrics.show')->with('healthmetrics', $healthmetrics);
    }

    /**
     * Show the form for editing the specified Healthmetrics.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Healthmetrics $healthmetrics */
        $healthmetrics = Healthmetrics::find($id);
        $healthmetrics->measurement_date = $healthmetrics->measurement_date->format('Y-m-d');

        if (empty($healthmetrics)) {
            Flash::error('Healthmetrics not found');

            return redirect(route('healthmetrics.index'));
        }

        return view('healthmetrics.edit')->with('healthmetrics', $healthmetrics);
    }

    /**
     * Update the specified Healthmetrics in storage.
     *
     * @param  int              $id
     * @param UpdateHealthmetricsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHealthmetricsRequest $request)
    {
        /** @var Healthmetrics $healthmetrics */
        $healthmetrics = Healthmetrics::find($id);

        if (empty($healthmetrics)) {
            Flash::error('Healthmetrics not found');

            return redirect(route('healthmetrics.index'));
        }

        $healthmetrics->fill($request->all());
        $healthmetrics->save();

        Flash::success('Healthmetrics updated successfully.');

        return redirect(route('healthmetrics.index'));
    }

    /**
     * Remove the specified Healthmetrics from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Healthmetrics $healthmetrics */
        $healthmetrics = Healthmetrics::find($id);

        if (empty($healthmetrics)) {
            Flash::error('Healthmetrics not found');

            return redirect(route('healthmetrics.index'));
        }

        $healthmetrics->delete();

        Flash::success('Healthmetrics deleted successfully.');

        return redirect(route('healthmetrics.index'));
    }
}
