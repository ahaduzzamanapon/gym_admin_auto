<?php

namespace App\Http\Controllers;

use App\DataTables\IncomeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class IncomeController extends AppBaseController
{
    /**
     * Display a listing of the Income.
     *
     * @param IncomeDataTable $incomeDataTable
     * @return Response
     */
    public function index(IncomeDataTable $incomeDataTable)
    {
        return $incomeDataTable->render('incomes.index');
    }

    /**
     * Show the form for creating a new Income.
     *
     * @return Response
     */
    public function create()
    {
        return view('incomes.create');
    }

    /**
     * Store a newly created Income in storage.
     *
     * @param CreateIncomeRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomeRequest $request)
    {
        $input = $request->all();

        /** @var Income $income */
        $income = Income::create($input);

        Flash::success('Income saved successfully.');

        return redirect(route('incomes.index'));
    }

    /**
     * Display the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Income $income */
        $income = Income::find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Income $income */
        $income = Income::find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('incomes.edit')->with('income', $income);
    }

    /**
     * Update the specified Income in storage.
     *
     * @param  int              $id
     * @param UpdateIncomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomeRequest $request)
    {
        /** @var Income $income */
        $income = Income::find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $income->fill($request->all());
        $income->save();

        Flash::success('Income updated successfully.');

        return redirect(route('incomes.index'));
    }

    /**
     * Remove the specified Income from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Income $income */
        $income = Income::find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $income->delete();

        Flash::success('Income deleted successfully.');

        return redirect(route('incomes.index'));
    }
}
