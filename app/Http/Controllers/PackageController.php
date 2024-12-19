<?php

namespace App\Http\Controllers;

use App\DataTables\PackageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Package;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageController extends AppBaseController
{
    /**
     * Display a listing of the Package.
     *
     * @param PackageDataTable $packageDataTable
     * @return Response
     */
    public function index(PackageDataTable $packageDataTable)
    {
        return $packageDataTable->render('packages.index');
    }

    /**
     * Show the form for creating a new Package.
     *
     * @return Response
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created Package in storage.
     *
     * @param CreatePackageRequest $request
     *
     * @return Response
     */
    public function store(CreatePackageRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('pack_image')) {
            $path = storage_path('app/public/images/pack_image');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('pack_image');
            $input['pack_image'] = $file->store('images/pack_image', 'public');
        }

        /** @var Package $package */
        $package = Package::create($input);

        Flash::success('Package saved successfully.');

        return redirect(route('packages.index'));
    }

    /**
     * Display the specified Package.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Package $package */
        $package = Package::find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('packages.index'));
        }

        return view('packages.show')->with('package', $package);
    }

    /**
     * Show the form for editing the specified Package.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Package $package */
        $package = Package::find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('packages.index'));
        }

        return view('packages.edit')->with('package', $package);
    }

    /**
     * Update the specified Package in storage.
     *
     * @param  int              $id
     * @param UpdatePackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackageRequest $request)
    {
        /** @var Package $package */
        $package = Package::find($id);
        $input = $request->all();

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('packages.index'));
        }

        if ($request->hasFile('pack_image')) {
            $path = storage_path('app/public/images/pack_image');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('pack_image');
            $input['pack_image'] = $file->store('images/pack_image', 'public');
        }else{
            unset($input['pack_image']);
        }

        $package->fill($input);
        $package->save();

        Flash::success('Package updated successfully.');

        return redirect(route('packages.index'));
    }

    /**
     * Remove the specified Package from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Package $package */
        $package = Package::find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('packages.index'));
        }

        $package->delete();

        Flash::success('Package deleted successfully.');

        return redirect(route('packages.index'));
    }

    public function packageCheck(Request $request){
        $data = $request->all();
        //dd($data);
        $Package = Package::where('id', $data['package_id'])
            ->first();
        $expire_date = date('Y-m-d', strtotime($Package->expire_date . '+'.$Package->pack_duration.' month'));
        if ($Package instanceof Package) {
            return response()->json([
                'status' => true,
                'data' => $Package,
                'expire_date' => $expire_date,
            ]);    
        }else{
            return response()->json([
                'status' => false,
                'data' => null,
            ]);
        }
    }
}
