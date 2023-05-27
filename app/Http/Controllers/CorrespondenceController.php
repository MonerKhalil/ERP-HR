<?php

namespace App\Http\Controllers;

use App\Models\Correspondence;
use App\Http\Controllers\Controller;
use App\Http\Requests\CorrespondenceRequest;
use Illuminate\Http\Request;

class CorrespondenceController extends Controller
{
    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Correspondence::class)->getTable());
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
    public function store(CorrespondenceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Correspondence  $correspondence
     * @return \Illuminate\Http\Response
     */
    public function show(Correspondence $correspondence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Correspondence  $correspondence
     * @return \Illuminate\Http\Response
     */
    public function edit(Correspondence $correspondence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Correspondence  $correspondence
     * @return \Illuminate\Http\Response
     */
    public function update(CorrespondenceRequest $request, Correspondence $correspondence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Correspondence  $correspondence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correspondence $correspondence)
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
