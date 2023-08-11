<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Http\Controllers\Controller;
use App\Http\Requests\Correspondence_source_destRequest;
use App\Models\Correspondence;
use App\Models\Correspondence_source_dest;
use App\Models\Employee;
use App\Models\SectionExternal;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LegalController extends Controller
{
    const Folder = "users";
    const IndexRoute = "Legal.index";

    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Correspondence_source_dest::class)->getTable());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = Correspondence::query();
        $q->whereHas("employee", function ($emp) use ($request) {
            $emp->whereHas("section", function ($q) use ($request) {
                if (auth()->user()->can("all_correspondences")) {
                    if (isset($request->filter["section_id"]) && !is_null($request->filter["section_id"])) {
                        $q->where("id", $request->filter["section_id"]);
                    }
                } else {
                    $q->where("id", auth()->user()->employee->section_id);
                }
            });
        });
        $correspondences = MyApp::Classes()->Search->getDataFilter($q, null, null, null);
//        dd($correspondences);
        return $this->responseSuccess("System.Pages.Actors.Diwan_User.viewCorrespondenses", compact("correspondences"));
    }

    public function addLegalOpinion($Correspondence_id)
    {
        $correspondence = Correspondence::query()->where("id", $Correspondence_id)->firstOrFail();
        $type=Correspondence::type();//internal,external
        $source_dest_type=Correspondence_source_dest::source_dest_type();//type
        $out_section=SectionExternal::query()->pluck("name","id")->toArray();//if external
        $employee_dest=Employee::query()->whereNot("user_id",Auth::id())->select(["id" , "first_name", "last_name"])->get();//if internal
        return $this->responseSuccess(".....", compact("employee_dest","correspondence",
            "source_dest_type","out_section","type"));
    }
    public function store(Correspondence_source_destRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = Arr::except($request->validated(),["data"]);
            if($request->hasFile("path_file")){
                $path = MyApp::Classes()->storageFiles
                    ->Upload($request['path_file'],"correspondence/document_Correspondence");
                $data['path_file']=$path;
            }
            if(!is_null( $request->date))
                foreach ($request->data as $soursDest){
                    $temp=$soursDest;
                    $data['current_employee_id']=$temp->current_employee_id;
                    $data['out_current_section_id']=$temp->out_current_section_id;
                    $data['in_employee_id_dest']=$temp->in_employee_id_dest;
                    $data['out_section_id_dest']=$temp->out_section_id_dest;
                    Correspondence_source_dest::query()->create($data);
                }
            DB::commit();
            return $this->responseSuccess(null,null,"create",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }



}
