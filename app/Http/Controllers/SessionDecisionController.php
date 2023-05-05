<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MessagesFlash;
use App\HelpersClasses\MyApp;
use App\Models\Employee;
use App\Models\SessionDecision;
use App\Http\Controllers\Controller;
use App\Http\Requests\SessionDecisionRequest;
use Illuminate\Support\Arr;

class SessionDecisionController extends Controller
{
    public const NameBlade = "";
    public const Folder = "institutions";
    public const IndexRoute = "system.session_decisions.index";

    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(SessionDecision::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MyApp::Classes()->Search->getDataFilter(SessionDecision::query());
        return $this->responseSuccess(self::NameBlade,compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::query()->select(["id"."first_name","last_name"])->get();
        return $this->responseSuccess("",compact("employees"));
    }


    /**
     * @throws \App\Exceptions\MainException
     */
    public function store(SessionDecisionRequest $request)
    {
        $data = Arr::except($request->validated(),["members"]);
        if (isset($data['image'])){
            $image = MyApp::Classes()->storageFiles->Upload($data['image']);
            if (is_bool($image)){
                MessagesFlash::Errors(__("err_image_upload"));
                return redirect()->back();
            }
            $data['image'] = $image;
        }
        if (isset($data['file'])){
            $file = MyApp::Classes()->storageFiles->Upload($data['file']);
            if (is_bool($file)){
                MessagesFlash::Errors(__("err_file_upload"));
                return redirect()->back();
            }
            $data['file'] = $file;
        }
        $Session = SessionDecision::query()->create($data);
        $Session->members()->syncWithoutDetaching($request->members);
        return $this->responseSuccess(null,null,"create",self::IndexRoute);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SessionDecision  $sessionDecision
     * @return \Illuminate\Http\Response
     */
    public function show(SessionDecision $sessionDecision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SessionDecision  $sessionDecision
     * @return \Illuminate\Http\Response
     */
    public function edit(SessionDecision $sessionDecision)
    {
        $data = SessionDecision::with(["members","moderator","institution"])->find($sessionDecision->id);
        return $this->responseSuccess("",compact("data"));
    }

    public function update(SessionDecisionRequest $request, SessionDecision $sessionDecision)
    {
        $data = Arr::except($request->validated(),["members"]);
        if (isset($data['image'])){
            $image = MyApp::Classes()->storageFiles->Upload($data['image']);
            if (is_bool($image)){
                MessagesFlash::Errors(__("err_image_upload"));
                return redirect()->back();
            }
            $data['image'] = $image;
            MyApp::Classes()->storageFiles->deleteFile($sessionDecision->image);
        }
        if (isset($data['file'])){
            $file = MyApp::Classes()->storageFiles->Upload($data['file']);
            if (is_bool($file)){
                MessagesFlash::Errors(__("err_file_upload"));
                return redirect()->back();
            }
            $data['file'] = $file;
            MyApp::Classes()->storageFiles->deleteFile($sessionDecision->file);
        }
        $sessionDecision->update($data);
        if (isset($request->members)){
            $sessionDecision->members()->syncWithoutDetaching($request->members);
        }
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SessionDecision  $sessionDecision
     * @return \Illuminate\Http\Response
     */
    public function destroy(SessionDecision $sessionDecision)
    {
        $sessionDecision->members()->delete();
        $sessionDecision->delete();
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
