<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteProfileRequest;
use App\Http\Requests\UpdateSiteProfileRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\SiteProfile;
use Illuminate\Http\Request;
use Flash;
use Response;
use File;

class SiteProfileController extends AppBaseController
{
    /**
     * Display a listing of the SiteProfile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SiteProfile $siteProfiles */
        $siteProfiles = SiteProfile::paginate(10);

        return view('site_profiles.index')
            ->with('siteProfiles', $siteProfiles);
    }

    /**
     * Show the form for creating a new SiteProfile.
     *
     * @return Response
     */
    public function create()
    {
        return view('site_profiles.create');
    }

    /**
     * Store a newly created SiteProfile in storage.
     *
     * @param CreateSiteProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteProfileRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('banner_image')) {
            $path = storage_path('app/public/images/site_profiles');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('banner_image');
            $input['banner_image'] = $file->store('images/site_profiles', 'public');
        }

        if ($request->hasFile('banner_video')) {
            $path = storage_path('app/public/videos/site_profiles');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('banner_video');
            $input['banner_video'] = $file->store('videos/site_profiles', 'public');
        }

        /** @var SiteProfile $siteProfile */
        $siteProfile = SiteProfile::create($input);

        Flash::success('Site Profile saved successfully.');

        return redirect(route('siteProfiles.index'));
    }

    /**
     * Display the specified SiteProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SiteProfile $siteProfile */
        $siteProfile = SiteProfile::find($id);

        if (empty($siteProfile)) {
            Flash::error('Site Profile not found');

            return redirect(route('siteProfiles.index'));
        }

        return view('site_profiles.show')->with('siteProfile', $siteProfile);
    }

    /**
     * Show the form for editing the specified SiteProfile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SiteProfile $siteProfile */
        $siteProfile = SiteProfile::find($id);

        if (empty($siteProfile)) {
            Flash::error('Site Profile not found');

            return redirect(route('siteProfiles.index'));
        }



        return view('site_profiles.edit')->with('siteProfile', $siteProfile);
    }

    /**
     * Update the specified SiteProfile in storage.
     *
     * @param int $id
     * @param UpdateSiteProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteProfileRequest $request)
    {
        /** @var SiteProfile $siteProfile */
        $siteProfile = SiteProfile::find($id);

        if (empty($siteProfile)) {
            Flash::error('Site Profile not found');

            return redirect(route('siteProfiles.index'));
        }

        $input = $request->all();

        if ($request->hasFile('banner_image')) {
            $path = storage_path('app/public/images/site_profiles');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('banner_image');
            $input['banner_image'] = $file->store('images/site_profiles', 'public');
        }else{
            unset($input['banner_image']);
        }

        if ($request->hasFile('banner_video')) {
            $path = storage_path('app/public/videos/site_profiles');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true, true);
            }
            $file = $request->file('banner_video');
            $input['banner_video'] = $file->store('videos/site_profiles', 'public');
        }else{
            unset($input['banner_video']);
        }




        $siteProfile->fill($input);
        $siteProfile->save();

        Flash::success('Site Profile updated successfully.');

        return redirect(route('siteProfiles.index'));
    }

    /**
     * Remove the specified SiteProfile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SiteProfile $siteProfile */
        $siteProfile = SiteProfile::find($id);

        if (empty($siteProfile)) {
            Flash::error('Site Profile not found');

            return redirect(route('siteProfiles.index'));
        }

        $siteProfile->delete();

        Flash::success('Site Profile deleted successfully.');

        return redirect(route('siteProfiles.index'));
    }
}
