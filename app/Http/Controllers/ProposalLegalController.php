<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ProposalLegal;
use App\Http\Requests\StoreProposalLegalRequest;
use App\Http\Requests\UpdateProposalLegalRequest;

class ProposalLegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Survey/ProposalPJ/Index');
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
    public function store(StoreProposalLegalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProposalLegal $proposalLegal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProposalLegal $proposalLegal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProposalLegalRequest $request, ProposalLegal $proposalLegal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProposalLegal $proposalLegal)
    {
        //
    }
}
