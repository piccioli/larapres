<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePresidentRequest;
use App\Http\Requests\UpdatePresidentRequest;
use App\Models\President;

class PresidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresidentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresidentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\President  $president
     * @return \Illuminate\Http\Response
     */
    public function show(President $president)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\President  $president
     * @return \Illuminate\Http\Response
     */
    public function edit(President $president)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresidentRequest  $request
     * @param  \App\Models\President  $president
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePresidentRequest $request, President $president)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\President  $president
     * @return \Illuminate\Http\Response
     */
    public function destroy(President $president)
    {
        //
    }
}
