<?php

namespace App\Http\Controllers;

use App\Exports\TableCustomExport;
use App\HelpersClasses\ExportPDF;
use App\HelpersClasses\MessagesFlash;
use App\HelpersClasses\MyApp;
use App\Http\Requests\BaseRequest;
use App\Models\Employee;
use App\Models\SessionDecision;
use App\Http\Requests\SessionDecisionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class SessionDecisionController extends Controller
{
    public const NameBlade = "System.Pages.Actors.sessionView";
    public const Folder = "session_decisions";
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
        $employees = Employee::query()->select(["id","first_name","last_name"])->get();
        return $this->responseSuccess("System.Pages.Actors.sessionForm" ,
            compact("employees"));
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
        $sessionDecision = SessionDecision::with(["moderator","members","decisions"])
            ->findOrFail($sessionDecision->id);
        return $this->responseSuccess("...",compact("sessionDecision"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SessionDecision  $sessionDecision
     * @return \Illuminate\Http\Response
     */
    public function edit(SessionDecision $sessionDecision)
    {
        $data = SessionDecision::with(["members","moderator"])->find($sessionDecision->id);
        $employees = Employee::query()->select(["id","first_name","last_name"])->get();
        return $this->responseSuccess("System.Pages.Actors.sessionForm",compact("data",'employees'));
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
        $sessionDecision->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function MultiDelete(Request $request)
    {
        $request->validate([
            "ids" => ["array","required"],
            "ids.*" => ["required",Rule::exists("session_decisions","id")],
        ]);
        SessionDecision::query()->whereIn("id",$request->ids)->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    public function ExportXls(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return Excel::download(new TableCustomExport($data['head'],$data['body'],"test"),self::Folder.".xlsx");
    }

    public function ExportPDF(BaseRequest $request)
    {
        $data = $this->MainExportData($request);
        return ExportPDF::downloadPDF($data['head'],$data['body']);
    }

    /**
     * @param Request $request
     * @return array
     * @author moner khalil
     */
    private function MainExportData(Request $request): array
    {
        $request->validate([
            "ids" => ["sometimes","array"],
            "ids.*" => ["sometimes",Rule::exists("session_decisions","id")],
        ]);
        $query = SessionDecision::query();
        $query = isset($request->ids) ? $query->whereIn("id",$request->ids) : $query;
        $data = MyApp::Classes()->Search->getDataFilter($query,null,true);
        $head = [
            [
                "head"=> "moderator",
                "relationFunc" => "moderator",
                "key" => "name",
            ],
            "name","description","date_session", "created_at",
        ];
        return [
            "head" => $head,
            "body" => $data,
        ];
    }
}
