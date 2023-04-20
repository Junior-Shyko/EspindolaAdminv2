<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ContactSite;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactSiteRequest;
use App\Http\Requests\UpdateContactSiteRequest;

class ContactSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Site/Contact/ContactSite');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactSiteRequest $request)
    {
       try {
        ContactSite::create($request->all());
        return response()->json(['message' => 'deu certo']);
       } catch (\Throwable $th) {
        throw $th;
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactSite $contactSite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = ContactSite::find($id);
        return Inertia::render('Site/Contact/EditContact' , ['editContact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            ContactSite::find($id)->update($request->all());
            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
         throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       try {
        ContactSite::find($id)->delete();
        return response()->json(['message' => 'success']);
       } catch (\Throwable $th) {
        throw $th;
       }
    }

    public function all()
    {
        try {
            return ContactSite::all();
            // response()->json($contact);
        } catch (\Exception $th) {
            return response()->json($th->getMessage());
        }
    }
}
