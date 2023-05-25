<?php

namespace App\Http\Controllers;

use App\Models\Correspondence_source_dest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Correspondence_source_destRequest;
use Illuminate\Http\Request;

class CorrespondenceSourceDestController extends Controller
{
    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Correspondence_source_dest::class)->getTable());
    }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Correspondence_source_destRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Correspondence_source_dest  $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function show(Correspondence_source_dest $correspondence_source_dest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Correspondence_source_dest  $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function edit(Correspondence_source_dest $correspondence_source_dest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Correspondence_source_dest  $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function update(Correspondence_source_destRequest $request, Correspondence_source_dest $correspondence_source_dest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Correspondence_source_dest  $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correspondence_source_dest $correspondence_source_dest)
    {
        //
    }

    public function MultiDelete(Request $request)
    {
        //
    }

    public function ExportXls()
    {
        //
    }

    public function ExportPDF()
    {
        //
    }
}
