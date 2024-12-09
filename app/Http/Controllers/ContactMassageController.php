<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactMassageRequest;
use App\Http\Requests\UpdateContactMassageRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\ContactMassage;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContactMassageController extends AppBaseController
{
    /**
     * Display a listing of the ContactMassage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        /** @var ContactMassage $contactMassages */
        $contactMassages = ContactMassage::paginate(10);

        return view('contact_massages.index')
            ->with('contactMassages', $contactMassages);
    }

    /**
     * Show the form for creating a new ContactMassage.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact_massages.create');
    }

    /**
     * Store a newly created ContactMassage in storage.
     *
     * @param CreateContactMassageRequest $request
     *
     * @return Response
     */
    public function store(CreateContactMassageRequest $request)

    {
        $input = $request->all();
        

        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'phone' => 'required',
            'message' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please provide a valid email address',
        ]);
        // dd($input);



        /** @var ContactMassage $contactMassage */
        $contactMassage = ContactMassage::create(
            [
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'subject' => $input['subject'],
                'message' => $input['message']
            ]
        );

        Flash::success('Contact Massage saved successfully.');

        return redirect()->back()->with('scrollToBottom', true);
    }

    /**
     * Display the specified ContactMassage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContactMassage $contactMassage */
        $contactMassage = ContactMassage::find($id);

        if (empty($contactMassage)) {
            Flash::error('Contact Massage not found');

            return redirect(route('contactMassages.index'));
        }

        return view('contact_massages.show')->with('contactMassage', $contactMassage);
    }

    /**
     * Show the form for editing the specified ContactMassage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ContactMassage $contactMassage */
        $contactMassage = ContactMassage::find($id);

        if (empty($contactMassage)) {
            Flash::error('Contact Massage not found');

            return redirect(route('contactMassages.index'));
        }

        return view('contact_massages.edit')->with('contactMassage', $contactMassage);
    }

    /**
     * Update the specified ContactMassage in storage.
     *
     * @param int $id
     * @param UpdateContactMassageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactMassageRequest $request)
    {
        /** @var ContactMassage $contactMassage */
        $contactMassage = ContactMassage::find($id);

        if (empty($contactMassage)) {
            Flash::error('Contact Massage not found');

            return redirect(route('contactMassages.index'));
        }

        $contactMassage->fill($request->all());
        $contactMassage->save();

        Flash::success('Contact Massage updated successfully.');

        return redirect(route('contactMassages.index'));
    }

    /**
     * Remove the specified ContactMassage from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContactMassage $contactMassage */
        $contactMassage = ContactMassage::find($id);

        if (empty($contactMassage)) {
            Flash::error('Contact Massage not found');

            return redirect(route('contactMassages.index'));
        }

        $contactMassage->delete();

        Flash::success('Contact Massage deleted successfully.');

        return redirect(route('contactMassages.index'));
    }
}
