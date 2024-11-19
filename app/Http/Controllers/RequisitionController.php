<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequisitionRequest;
use App\Http\Requests\UpdateRequisitionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Requisition;
use Illuminate\Http\Request;
use Flash;
use Response;

class RequisitionController extends AppBaseController
{
    /**
     * Display a listing of the Requisition.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Requisition $requisitions */
        if(if_can('show_all_data')){
            $requisitions = Requisition::select('requisitions.*', 'products.product_name', 'members.mem_name as member_name')
                ->join('products', 'products.id', '=', 'requisitions.product_id')
                ->join('members', 'members.id', '=', 'requisitions.member_id')
                ->paginate(10);
        }else{
            $requisitions = Requisition::select('requisitions.*', 'products.product_name', 'members.mem_name as member_name')
                ->join('products', 'products.id', '=', 'requisitions.product_id')
                ->join('members', 'members.id', '=', 'requisitions.member_id')
                ->where('members.id', auth()->user()->member_id)
                ->paginate(10);
        }

        return view('requisitions.index')
            ->with('requisitions', $requisitions);
    }

    /**
     * Show the form for creating a new Requisition.
     *
     * @return Response
     */
    public function create()
    {
        return view('requisitions.create');
    }

    /**
     * Store a newly created Requisition in storage.
     *
     * @param CreateRequisitionRequest $request
     *
     * @return Response
     */
    public function store(CreateRequisitionRequest $request)
    {
        $input = $request->all();

        /** @var Requisition $requisition */
        $requisition = Requisition::create($input);

        Flash::success('Requisition saved successfully.');

        return redirect(route('requisitions.index'));
    }

    /**
     * Display the specified Requisition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requisition = Requisition::select('requisitions.*', 'products.product_name', 'members.mem_name as member_name')
            ->join('products', 'products.id', '=', 'requisitions.product_id')
            ->join('members', 'members.id', '=', 'requisitions.member_id')
            ->find($id);

        if (empty($requisition)) {
            Flash::error('Requisition not found');

            return redirect(route('requisitions.index'));
        }

        return view('requisitions.show')->with('requisition', $requisition);
    }

    /**
     * Show the form for editing the specified Requisition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Requisition $requisition */
        $requisition = Requisition::find($id);

        if (empty($requisition)) {
            Flash::error('Requisition not found');

            return redirect(route('requisitions.index'));
        }

        return view('requisitions.edit')->with('requisition', $requisition);
    }

    /**
     * Update the specified Requisition in storage.
     *
     * @param int $id
     * @param UpdateRequisitionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequisitionRequest $request)
    {
        /** @var Requisition $requisition */
        $requisition = Requisition::find($id);

        if (empty($requisition)) {
            Flash::error('Requisition not found');

            return redirect(route('requisitions.index'));
        }

        $requisition->fill($request->all());
        $requisition->save();

        Flash::success('Requisition updated successfully.');

        return redirect(route('requisitions.index'));
    }

    /**
     * Remove the specified Requisition from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Requisition $requisition */
        $requisition = Requisition::find($id);

        if (empty($requisition)) {
            Flash::error('Requisition not found');

            return redirect(route('requisitions.index'));
        }

        $requisition->delete();

        Flash::success('Requisition deleted successfully.');

        return redirect(route('requisitions.index'));
    }
}
