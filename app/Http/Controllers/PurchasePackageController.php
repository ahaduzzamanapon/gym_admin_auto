<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePurchasePackageRequest;
use App\Http\Requests\UpdatePurchasePackageRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\PurchasePackage;
use App\Models\Member;
use App\Models\MultiBranch;
use App\Models\Income;
use App\Models\Package;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\SiteSetting;

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
        if(if_can('show_all_data')){
            $purchasePackages = PurchasePackage::select('purchasepackages.*', 'packages.pack_name as pack_name', 'members.mem_name as member_name')
            ->join('packages', 'packages.id', '=', 'purchasepackages.package_id')
            ->join('members', 'members.id', '=', 'purchasepackages.member_id')
            ->orderBy('purchasepackages.id', 'desc')
            ->get();
        }else
        {
            $purchasePackages = PurchasePackage::select('purchasepackages.*', 'packages.pack_name as pack_name', 'members.mem_name as member_name')
            ->join('packages', 'packages.id', '=', 'purchasepackages.package_id')
            ->join('members', 'members.id', '=', 'purchasepackages.member_id')
            ->where('members.id', auth()->user()->member_id)
            ->orderBy('purchasepackages.id', 'desc')
            ->get();
        }

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
        $purchasePackage = PurchasePackage::create($input);
        $purchasePackages_data = PurchasePackage::select('purchasepackages.*', 'packages.pack_name as pack_name','packages.pack_duration', 'members.mem_name as member_name', 'members.member_unique_id as member_unique_id')
            ->join('packages', 'packages.id', '=', 'purchasepackages.package_id')
            ->join('members', 'members.id', '=', 'purchasepackages.member_id')
            ->where('purchasepackages.id',$purchasePackage->id)
            ->first();
        $title=$purchasePackages_data->member_name.' Purchased a Package '.$purchasePackages_data->pack_name;"";
        $member_details=Member::where('id',$purchasePackages_data->member_id)->first();
        $branch_details=MultiBranch::where('id',$member_details->branch_id)->first();
        $branch_name=$branch_details->branch_name;
        $description=$member_details->mem_name.' ( '.$member_details->member_unique_id.' ) '.' Purchased a Package '.$purchasePackages_data->pack_name.' in '.$branch_name;
        $income=new Income();
        $income->title=$title;
        $income->branch_id=$member_details->branch_id;
        $income->member_id=$member_details->id;
        $income->amount=$purchasePackages_data->pay_amount;
        $income->description=$description;
        $income->save();
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
    public function invoice($id){
        /** @var PurchasePackage $purchasePackage */
        $sale = PurchasePackage::select('purchasepackages.*', 'packages.pack_name as pack_name', 'members.mem_name as member_name')
            ->join('packages', 'packages.id', '=', 'purchasepackages.package_id')
            ->join('members', 'members.id', '=', 'purchasepackages.member_id')
            ->where('purchasepackages.id', $id)
            ->first();
        $SiteSetting = SiteSetting::first();
        return view('purchase_packages.invoice', compact('sale', 'SiteSetting'));
    }
    public function renew($id){
        /** @var PurchasePackage $purchasePackage */
        $purchasePackage = PurchasePackage::find($id);
        if (empty($purchasePackage)) {
            Flash::error('Purchase Package not found');

            return redirect(route('purchasePackages.index'));
        }
        $member=Member::where('id',$purchasePackage->member_id)->first();
        $package=Package::where('id',$purchasePackage->package_id)->first();
        $expired_date = date('Y-m-d', strtotime($package->expired_date . '+'.$package->pack_duration.' month'));
        $purchasePackage->expired_date=$expired_date;
        $purchasePackage->save();
        $title=$member->mem_name.' Renewed a Package '.$package->pack_name;"";
        $member_details=Member::where('id',$member->id)->first();
        $branch_details=MultiBranch::where('id',$member_details->branch_id)->first();
        $branch_name=$branch_details->branch_name;
        $description=$member_details->mem_name.' ( '.$member_details->member_unique_id.' ) '.' Renewed a Package '.$package->pack_name.' in '.$branch_name;
        $income=new Income();
        $income->title=$title;
        $income->branch_id=$member_details->branch_id;
        $income->member_id=$member_details->id;
        $income->amount=$package->pack_admission_fee;
        $income->description=$description;
        $income->save();
        Flash::success('Purchase Package Renewed successfully.');
        return redirect(route('purchasePackages.index'));
    }
}
