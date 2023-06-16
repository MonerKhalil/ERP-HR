<?php

namespace App\Http\Controllers;

use App\Http\Requests\OvertimeTypeRequest;
use App\Models\OvertimeType;
use Illuminate\Http\Request;

class OvertimeTypeController extends Controller
{
    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(OvertimeType::class)->getTable());
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
    public function store(OvertimeTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OvertimeType  $overtimeType
     * @return \Illuminate\Http\Response
     */
    public function show(OvertimeType $overtimeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OvertimeType  $overtimeType
     * @return \Illuminate\Http\Response
     */
    public function edit(OvertimeType $overtimeType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OvertimeType  $overtimeType
     * @return \Illuminate\Http\Response
     */
    public function update(OvertimeTypeRequest $request, OvertimeType $overtimeType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OvertimeType  $overtimeType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OvertimeType $overtimeType)
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
