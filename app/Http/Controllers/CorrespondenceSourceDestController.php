<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Models\Correspondence;
use App\Models\Correspondence_source_dest;
use App\Http\Requests\Correspondence_source_destRequest;
use App\Models\Employee;
use App\Models\SectionExternal;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CorrespondenceSourceDestController extends Controller
{
    const Folder = "users";
    const IndexRoute = "system.Correspondence.index";

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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Correspondence::type();//internal,external
        $source_dest_type = Correspondence_source_dest::source_dest_type();//type
        $external_party = SectionExternal::query()->pluck("name", "id")->toArray();//if external
        $internal_department = Sections::query()->pluck("name", "id")->toArray();//if external
        return $this->responseSuccess('System.Pages.Actors.Diwan_User.addSourceDest', compact("internal_department",
            "source_dest_type", "external_party", "type"));
    }

    public function addTransaction($Correspondence_id)
    {
        $correspondence = Correspondence::query()->where("id", $Correspondence_id)->firstOrFail();
        $type = Correspondence::type();//internal,external
        $source_dest_type = Correspondence_source_dest::source_dest_type();//type
        $external_party = SectionExternal::query()->pluck("name", "id")->toArray();//if external
        $internal_department = Sections::query()->pluck("name", "id")->toArray();//if external
        $employee_dest = Employee::query()->whereNot("user_id", Auth::id())->select(["id", "first_name", "last_name"])->get();//if internal
        return $this->responseSuccess("System.Pages.Actors.Diwan_User.addSourceDest", compact("employee_dest", "correspondence",
            "source_dest_type", "external_party", "type","internal_department"));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Correspondence_source_destRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = Arr::except($request->validated(), ["data"]);
            if ($request->hasFile("path_file")) {
                $path = MyApp::Classes()->storageFiles
                    ->Upload($request['path_file'], "correspondence/document_Correspondence");
                $data['path_file'] = $path;
            }
            $data['current_employee_id'] =  auth()->user()->employee->id;
            $data['external_party_id'] = $request->external_party_id;
            $data['internal_department_id'] = $request->internal_department_id;
            Correspondence_source_dest::query()->create($data);
//            if (!is_null($request->date)) {
//                foreach ($request->data as $soursDest) {
//                    $temp = $soursDest;
//                    $data['current_employee_id'] =  auth()->user()->employee->id;
//                    $data['external_party_id'] = $temp->external_party_id;
//                    $data['internal_department_id'] = $temp->internal_department_id;
//                    Correspondence_source_dest::query()->create($data);
//                }
//            }

            DB::commit();
            return $this->responseSuccess(null, null, "create", self::IndexRoute);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Correspondence $Correspondence
     * @return \Illuminate\Http\Response
     */
    public function show(Correspondence $Correspondence)
    {
        $correspondence_transaction = Correspondence_source_dest::with(["employee_current", "employee_dest", "out_section_dest", "out_section_current"])
            ->find($Correspondence->id);
        return $this->responseSuccess(".....", compact("correspondence_transaction"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Correspondence_source_dest $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function edit(Correspondence_source_dest $correspondence_source_dest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Correspondence_source_dest $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function update(Correspondence_source_destRequest $request, Correspondence_source_dest $correspondence_source_dest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Correspondence_source_dest $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correspondence_source_dest $correspondence_source_dest)
    {
        $correspondence_source_dest->delete();
        return $this->responseSuccess(null, null, "delete", self::IndexRoute);
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
