<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchasePackageRequest;
use App\Http\Requests\UpdatePurchasePackageRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\PurchasePackage;
use Illuminate\Http\Request;
use Flash;
use Response;

class PurchasePackageController extends AppBaseController
{
    /**
     * Display a listing of the PurchasePackage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var PurchasePackage $purchasePackages */
        $purchasePackages = PurchasePackage::paginate(10);

        return view('purchase_packages.index')
            ->with('purchasePackages', $purchasePackages);
    }

    /**
     * Show the form for creating a new PurchasePackage.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchase_packages.create');
    }

    /**
     * Store a newly created PurchasePackage in storage.
     *
     * @param CreatePurchasePackageRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchasePackageRequest $request)
    {
        $input = $request->all();

        /** @var PurchasePackage $purchasePackage */
        $purchasePackage = PurchasePackage::create($input);

        Flash::success('Purchase Package saved successfully.');

        return redirect(route('purchasePackages.index'));
    }

    /**
     * Display the specified PurchasePackage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PurchasePackage $purchasePackage */
        $purchasePackage = PurchasePackage::find($id);

        if (empty($purchasePackage)) {
            Flash::error('Purchase Package not found');

            return redirect(route('purchasePackages.index'));
        }

        return view('purchase_packages.show')->with('purchasePackage', $purchasePackage);
    }

    /**
     * Show the form for editing the specified PurchasePackage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var PurchasePackage $purchasePackage */
        $purchasePackage = PurchasePackage::find($id);

        if (empty($purchasePackage)) {
            Flash::error('Purchase Package not found');

            return redirect(route('purchasePackages.index'));
        }

        return view('purchase_packages.edit')->with('purchasePackage', $purchasePackage);
    }

    /**
     * Update the specified PurchasePackage in storage.
     *
     * @param int $id
     * @param UpdatePurchasePackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchasePackageRequest $request)
    {
        /** @var PurchasePackage $purchasePackage */
        $purchasePackage = PurchasePackage::find($id);

        if (empty($purchasePackage)) {
            Flash::error('Purchase Package not found');

            return redirect(route('purchasePackages.index'));
        }

        $purchasePackage->fill($request->all());
        $purchasePackage->save();

        Flash::success('Purchase Package updated successfully.');

        return redirect(route('purchasePackages.index'));
    }

    /**
     * Remove the specified PurchasePackage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PurchasePackage $purchasePackage */
        $purchasePackage = PurchasePackage::find($id);

        if (empty($purchasePackage)) {
            Flash::error('Purchase Package not found');

            return redirect(route('purchasePackages.index'));
        }

        $purchasePackage->delete();

        Flash::success('Purchase Package deleted successfully.');

        return redirect(route('purchasePackages.index'));
    }
}
