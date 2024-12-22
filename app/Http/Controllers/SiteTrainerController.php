<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteTrainerRequest;
use App\Http\Requests\UpdateSiteTrainerRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\SiteTrainer;
use Illuminate\Http\Request;
use Flash;
use Response;
use File;

class SiteTrainerController extends AppBaseController
{
    /**
     * Display a listing of the SiteTrainer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var SiteTrainer $siteTrainers */
        $siteTrainers = SiteTrainer::paginate(10);
        return view('site_trainers.index')
            ->with('siteTrainers', $siteTrainers);
    }


    public function create()
    {
        return view('site_trainers.create');
    }

    /**
     * Store a newly created SiteTrainer in storage.
     *
     * @param CreateSiteTrainerRequest $request
     *
     * @return Response
     */
    public function store(CreateSiteTrainerRequest $request)
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

        /** @var SiteTrainer $siteTrainer */
        $siteTrainer = SiteTrainer::create($input);

        Flash::success('Site Trainer saved successfully.');

        return redirect(route('siteTrainers.index'));
    }

    /**
     * Display the specified SiteTrainer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SiteTrainer $siteTrainer */
        $siteTrainer = SiteTrainer::find($id);

        if (empty($siteTrainer)) {
            Flash::error('Site Trainer not found');

            return redirect(route('siteTrainers.index'));
        }

        return view('site_trainers.show')->with('siteTrainer', $siteTrainer);
    }

    /**
     * Show the form for editing the specified SiteTrainer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SiteTrainer $siteTrainer */
        $siteTrainer = SiteTrainer::find($id);

        if (empty($siteTrainer)) {
            Flash::error('Site Trainer not found');

            return redirect(route('siteTrainers.index'));
        }

        return view('site_trainers.edit')->with('siteTrainer', $siteTrainer);
    }

    /**
     * Update the specified SiteTrainer in storage.
     *
     * @param int $id
     * @param UpdateSiteTrainerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSiteTrainerRequest $request)
    {
        /** @var SiteTrainer $siteTrainer */
        $siteTrainer = SiteTrainer::find($id);

        if (empty($siteTrainer)) {
            Flash::error('Site Trainer not found');

            return redirect(route('siteTrainers.index'));
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

        $siteTrainer->fill($input);
        $siteTrainer->save();

        Flash::success('Site Trainer updated successfully.');

        return redirect(route('siteTrainers.index'));
    }

    /**
     * Remove the specified SiteTrainer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SiteTrainer $siteTrainer */
        $siteTrainer = SiteTrainer::find($id);

        if (empty($siteTrainer)) {
            Flash::error('Site Trainer not found');

            return redirect(route('siteTrainers.index'));
        }

        $siteTrainer->delete();

        Flash::success('Site Trainer deleted successfully.');

        return redirect(route('siteTrainers.index'));
    }
}
