<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequisitionRequest;
use App\Http\Requests\UpdateRequisitionRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Requisition;
use Illuminate\Http\Request;
use App\Models\Product;

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
            $query = Requisition::select('requisitions.*', 'products.product_name', 'members.mem_name as member_name')
                ->join('products', 'products.id', '=', 'requisitions.product_id')
                ->join('members', 'members.id', '=', 'requisitions.member_id');
            if (!if_can('see_all_branch')) {
                $query->where('members.branch_id', get_branch());
            }
            $requisitions = $query->get();
        }else{
            $requisitions = Requisition::select('requisitions.*', 'products.product_name', 'members.mem_name as member_name')
                ->join('products', 'products.id', '=', 'requisitions.product_id')
                ->join('members', 'members.id', '=', 'requisitions.member_id')
                ->where('members.id', auth()->user()->member_id)
                ->get();
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

       // dd();

        if ($request->all()['status'] == 4) {
            $requisition = Requisition::find($id);
            $product =Product::find($requisition->product_id);
            $product->product_qty = $product->product_qty - $requisition->qty;
            $product->save();
        }

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
