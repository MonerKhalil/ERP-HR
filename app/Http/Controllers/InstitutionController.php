<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MessagesFlash;
use App\HelpersClasses\MyApp;
use App\Models\Institution;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstitutionRequest;
use Illuminate\Support\Arr;

class InstitutionController extends Controller
{
    public const NameBlade = "";
    public const Folder = "institutions";
    public const IndexRoute = "system.type_institutions.index";
    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Institution::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MyApp::Classes()->Search->getDataFilter(Institution::query());
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
     * @throws MainException
     */
    public function store(InstitutionRequest $request)
    {
        $data = $request->validated();
        if (isset($data['image'])){
            $image = MyApp::Classes()->storageFiles->Upload($data['image']);
            if (is_bool($image)){
                MessagesFlash::Errors(__("err_image_upload"));
                return redirect()->back();
            }
            $data['image'] = $image;
        }
        Institution::query()->create($data);
        return $this->responseSuccess(null,null,"create",self::IndexRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        //
    }


    public function update(InstitutionRequest $request, Institution $institution)
    {
        $data = $request->validated();
        if (isset($data['image'])){
            $image = MyApp::Classes()->storageFiles->Upload($data['image']);
            if (is_bool($image)){
                MessagesFlash::Errors(__("err_image_upload"));
                return redirect()->back();
            }
            $data['image'] = $image;
            if (!is_null($institution->image))
                MyApp::Classes()->storageFiles->deleteFile($institution->image);
        }
        $institution->update($data);
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();
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
