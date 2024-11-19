<?php

namespace App\Http\Controllers;

use App\Models\EconomicBenefit;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class EconomicBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_points = Auth::user()->points;    
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EconomicBenefit $economicBenefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EconomicBenefit $economicBenefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EconomicBenefit $economicBenefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EconomicBenefit $economicBenefit)
    {
        //
    }
}
