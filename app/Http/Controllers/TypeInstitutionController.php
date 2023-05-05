<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MyApp;
use App\Models\TypeInstitution;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeInstitutionRequest;

class TypeInstitutionController extends Controller
{
    public const NameBlade = "";
    public const IndexRoute = "system.type_institutions.index";
    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(TypeInstitution::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MyApp::Classes()->Search->getDataFilter(TypeInstitution::query());
        return $this->responseSuccess(self::NameBlade,compact("data"));
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
    public function store(TypeInstitutionRequest $request)
    {
        TypeInstitution::query()->create($request->validated());
        return $this->responseSuccess(null,null,"create",self::IndexRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeInstitution  $typeInstitution
     * @return \Illuminate\Http\Response
     */
    public function show(TypeInstitution $typeInstitution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeInstitution  $typeInstitution
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeInstitution $typeInstitution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeInstitution  $typeInstitution
     * @return \Illuminate\Http\Response
     */
    public function update(TypeInstitutionRequest $request, TypeInstitution $typeInstitution)
    {
        $typeInstitution->update($request->validated());
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeInstitution  $typeInstitution
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeInstitution $typeInstitution)
    {
        $typeInstitution->delete();
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
