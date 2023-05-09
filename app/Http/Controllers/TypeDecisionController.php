<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MyApp;
use App\Models\TypeDecision;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeDecisionRequest;
use Illuminate\Http\Response;

class TypeDecisionController extends Controller
{
    public const NameBlade = "";
    public const IndexRoute = "system.type_decisions.index";
    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(TypeDecision::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = MyApp::Classes()->Search->getDataFilter(TypeDecision::query());
        return $this->responseSuccess(self::NameBlade,compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(TypeDecisionRequest $request)
    {
        TypeDecision::query()->create($request->validated());
        return $this->responseSuccess(null,null,"create",self::IndexRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param TypeDecision $typeDecision
     * @return void
     */
    public function show(TypeDecision $typeDecision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TypeDecision $typeDecision
     * @return Response
     */
    public function edit(TypeDecision $typeDecision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param TypeDecision $typeDecision
     * @return Response
     */
    public function update(TypeDecisionRequest $request, TypeDecision $typeDecision)
    {
        $typeDecision->update($request->validated());
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TypeDecision $typeDecision
     * @return Response
     */
    public function destroy(TypeDecision $typeDecision)
    {
        $typeDecision->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
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
