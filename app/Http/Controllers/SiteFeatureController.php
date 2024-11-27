<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteFeatureRequest;
use App\Http\Requests\UpdateSiteFeatureRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\SiteFeature;
use Illuminate\Http\Request;
use Flash;
use Response;
use File;

class SiteFeatureController extends AppBaseController
{
    /**
     * Display a listing of the SiteFeature.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SiteFeature $siteFeatures */
        $siteFeatures = SiteFeature::paginate(10);

        return view('site_features.index')
            ->with('siteFeatures', $siteFeatures);
    }

    /**
     * Show the form for creating a new SiteFeature.
     *
     * @return Response
     */
    public function create()
    {
        return view('site_features.create');
    }

    /**
     * Store a newly created SiteFeature in storage.
     *
     * @param CreateSiteFeatureRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteFeatureRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = storage_path('app/public/images/site_features');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('image');
            $input['image'] = $file->store('images/site_features', 'public');
        }

        /** @var SiteFeature $siteFeature */
        $siteFeature = SiteFeature::create($input);

        Flash::success('Site Feature saved successfully.');

        return redirect(route('siteFeatures.index'));
    }

    /**
     * Display the specified SiteFeature.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SiteFeature $siteFeature */
        $siteFeature = SiteFeature::find($id);

        if (empty($siteFeature)) {
            Flash::error('Site Feature not found');

            return redirect(route('siteFeatures.index'));
        }

        return view('site_features.show')->with('siteFeature', $siteFeature);
    }

    /**
     * Show the form for editing the specified SiteFeature.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SiteFeature $siteFeature */
        $siteFeature = SiteFeature::find($id);

        if (empty($siteFeature)) {
            Flash::error('Site Feature not found');

            return redirect(route('siteFeatures.index'));
        }

        return view('site_features.edit')->with('siteFeature', $siteFeature);
    }

    /**
     * Update the specified SiteFeature in storage.
     *
     * @param int $id
     * @param UpdateSiteFeatureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteFeatureRequest $request)
    {
        /** @var SiteFeature $siteFeature */
        $siteFeature = SiteFeature::find($id);

        if (empty($siteFeature)) {
            Flash::error('Site Feature not found');

            return redirect(route('siteFeatures.index'));
        }
        $input = $request->all();
        if ($request->hasFile('image')) {
            $path = storage_path('app/public/images/site_features');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('image');
            $input['image'] = $file->store('images/site_features', 'public');
        }else{
            unset($input['image']);
        }

        $siteFeature->fill($input);
        $siteFeature->save();

        Flash::success('Site Feature updated successfully.');

        return redirect(route('siteFeatures.index'));
    }

    /**
     * Remove the specified SiteFeature from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SiteFeature $siteFeature */
        $siteFeature = SiteFeature::find($id);

        if (empty($siteFeature)) {
            Flash::error('Site Feature not found');

            return redirect(route('siteFeatures.index'));
        }

        $siteFeature->delete();

        Flash::success('Site Feature deleted successfully.');

        return redirect(route('siteFeatures.index'));
    }
}
