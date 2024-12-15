<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Flash;
use Response;

class AboutUsController extends AppBaseController
{
    /**
     * Display a listing of the AboutUs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var AboutUs $aboutuses */
        $aboutuses = AboutUs::paginate(10);

        return view('aboutuses.index')
            ->with('aboutuses', $aboutuses);
    }

    /**
     * Show the form for creating a new AboutUs.
     *
     * @return Response
     */
    public function create()
    {
        return view('aboutuses.create');
    }

    /**
     * Store a newly created AboutUs in storage.
     *
     * @param CreateAboutUsRequest $request
     *
     * @return Response
     */
    public function store(CreateAboutUsRequest $request)
    {
        $input = $request->all();

        /** @var AboutUs $aboutUs */
        $aboutUs = AboutUs::create($input);

        Flash::success('About Us saved successfully.');

        return redirect(route('aboutuses.index'));
    }

    /**
     * Display the specified AboutUs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AboutUs $aboutUs */
        $aboutUs = AboutUs::find($id);

        if (empty($aboutUs)) {
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        return view('aboutuses.show')->with('aboutUs', $aboutUs);
    }

    /**
     * Show the form for editing the specified AboutUs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var AboutUs $aboutUs */
        $aboutUs = AboutUs::find($id);

        if (empty($aboutUs)) {
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        return view('aboutuses.edit')->with('aboutUs', $aboutUs);
    }

    /**
     * Update the specified AboutUs in storage.
     *
     * @param int $id
     * @param UpdateAboutUsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAboutUsRequest $request)
    {
        /** @var AboutUs $aboutUs */
        $aboutUs = AboutUs::find($id);

        if (empty($aboutUs)) {
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        $aboutUs->fill($request->all());
        $aboutUs->save();

        Flash::success('About Us updated successfully.');

        return redirect(route('aboutuses.index'));
    }

    /**
     * Remove the specified AboutUs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AboutUs $aboutUs */
        $aboutUs = AboutUs::find($id);

        if (empty($aboutUs)) {
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        $aboutUs->delete();

        Flash::success('About Us deleted successfully.');

        return redirect(route('aboutuses.index'));
    }
}
