<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Http\Controllers\Controller;
use App\Http\Requests\Correspondence_source_destRequest;
use App\Models\Correspondence;
use App\Models\Correspondence_source_dest;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
            $q = Correspondence_source_dest::with('correspondence');

        if (isset($request->filter["Correspondence_id"]) && !is_null($request->filter["Correspondence_id"])){
            $q = $q->whereHas("correspondence",function ($query)use($request){
                $query->where("correspondences_id",$request->filter["Correspondence_id"]);
            });
        }
        $correspondence_source_dest = MyApp::Classes()->Search->getDataFilter($q, null, null, "contract_date");
        return $this->responseSuccess("System.Pages.Actors.Diwan_User.viewCorrespondenses", compact("correspondence_source_dest"));
    }

    public function sendLegalOpinion($Correspondence_id)
    {
        $correspondence = Correspondence::query()->where("id", $Correspondence_id)->firstOrFail();
        $internal_legal = Sections::query()->where("name","section_legal")->get();//if external
        Correspondence_source_dest::query()->create([
            "correspondences_id"=>$correspondence->id,
            "current_employee_id"=>auth()->user()->employee->id,
            //"external_party_id",
            "internal_department_id"=>$internal_legal->id,
            "is_done"=>false,
            "type"=>"internal",
           // "path_file",
            "source_dest_type"=>"outgoing",
        ]);
        return $this->responseSuccess(".....", compact("internal_legal","correspondence"));
    }

    public function addLegalOpinion(Request $request)
    {
        $request->validate( [
            "id"=>["required",Rule::exists("correspondence_source_dests","id")],
            "is_legal"=>["required",Rule::in(["legal","illegal"]) ],
            "legal_opinion"=>["nullable","string"],
            "path_file_legal_opinion"=>["nullable","mimes:pdf","docx","max:10000"]
        ]);
        try {
            DB::beginTransaction();

            if($request->hasFile("path_file_legal_opinion")){
                $path = MyApp::Classes()->storageFiles
                    ->Upload($request['path_file_legal_opinion'],"legal/document_Correspondence");
                $data['path_file_legal_opinion']=$path;
            }
            $correspondence = Correspondence_source_dest::query()->where("id", $request->id)->update([
                "legal_opinion"=>$request->legal_opinion,
                "path_file_legal_opinion"=>$data['path_file_legal_opinion'],
                "is_legal"=>$request->is_legal,

            ]);
            DB::commit();
            return $this->responseSuccess(null,null,"create",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }
}
