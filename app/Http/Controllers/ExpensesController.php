<?php

namespace App\Http\Controllers;

use App\DataTables\ExpensesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateExpensesRequest;
use App\Http\Requests\UpdateExpensesRequest;
use App\Models\Expenses;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ExpensesController extends AppBaseController
{
    /**
     * Display a listing of the Expenses.
     *
     * @param ExpensesDataTable $expensesDataTable
     * @return Response
     */
    public function index(ExpensesDataTable $expensesDataTable)
    {
        return $expensesDataTable->render('expenses.index');
    }

    /**
     * Show the form for creating a new Expenses.
     *
     * @return Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created Expenses in storage.
     *
     * @param CreateExpensesRequest $request
     *
     * @return Response
     */
    public function store(CreateExpensesRequest $request)
    {
        $input = $request->all();

        /** @var Expenses $expenses */
        $expenses = Expenses::create($input);

        Flash::success('Expenses saved successfully.');

        return redirect(route('expenses.index'));
    }

    /**
     * Display the specified Expenses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Expenses $expenses */
        $expenses = Expenses::find($id);

        if (empty($expenses)) {
            Flash::error('Expenses not found');

            return redirect(route('expenses.index'));
        }

        return view('expenses.show')->with('expenses', $expenses);
    }

    /**
     * Show the form for editing the specified Expenses.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Expenses $expenses */
        $expenses = Expenses::find($id);

        if (empty($expenses)) {
            Flash::error('Expenses not found');

            return redirect(route('expenses.index'));
        }

        return view('expenses.edit')->with('expenses', $expenses);
    }

    /**
     * Update the specified Expenses in storage.
     *
     * @param  int              $id
     * @param UpdateExpensesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpensesRequest $request)
    {
        /** @var Expenses $expenses */
        $expenses = Expenses::find($id);

        if (empty($expenses)) {
            Flash::error('Expenses not found');

            return redirect(route('expenses.index'));
        }

        $expenses->fill($request->all());
        $expenses->save();

        Flash::success('Expenses updated successfully.');

        return redirect(route('expenses.index'));
    }

    /**
     * Remove the specified Expenses from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Expenses $expenses */
        $expenses = Expenses::find($id);

        if (empty($expenses)) {
            Flash::error('Expenses not found');

            return redirect(route('expenses.index'));
        }

        $expenses->delete();

        Flash::success('Expenses deleted successfully.');

        return redirect(route('expenses.index'));
    }
}
