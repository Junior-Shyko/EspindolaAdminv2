<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactSiteRequest;
use App\Http\Requests\UpdateContactSiteRequest;
use App\Models\ContactSite;
use Inertia\Inertia;

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
        //
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
    public function edit(ContactSite $contactSite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactSiteRequest $request, ContactSite $contactSite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactSite $contactSite)
    {
        //
    }
}
