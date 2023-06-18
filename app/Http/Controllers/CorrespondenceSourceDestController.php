<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Models\Correspondence;
use App\Models\Correspondence_source_dest;
use App\Http\Requests\Correspondence_source_destRequest;
use App\Models\Employee;
use App\Models\SectionExternal;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CorrespondenceSourceDestController extends Controller
{
    const Folder = "users";
    const IndexRoute = "system. Correspondence.index";
//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Correspondence_source_dest::class)->getTable());
//    }

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
        $type=Correspondence::type();//internal,external
        $source_dest_type=Correspondence_source_dest::source_dest_type();//type
        $out_section=SectionExternal::query()->pluck("name","id")->toArray();//if external
        $employee_dest=Employee::query()->whereNot("user_id",Auth::id())->pluck("name","id")->toArray();//if internal
        return $this->responseSuccess(".....", compact("employee_dest",
            "source_dest_type","out_section","type"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Correspondence_source_dest  $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function show(Correspondence_source_dest $correspondence_source_dest)
    {

      $correspondence_transaction=  Correspondence::with(["correspondence"])->find($correspondence_source_dest->correspondences_id);
        return $this->responseSuccess(".....", compact("correspondence_transaction"));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Correspondence_source_dest  $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function edit(Correspondence_source_dest $correspondence_source_dest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Correspondence_source_dest  $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function update(Correspondence_source_destRequest $request, Correspondence_source_dest $correspondence_source_dest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Correspondence_source_dest  $correspondence_source_dest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correspondence_source_dest $correspondence_source_dest)
    {
        $correspondence_source_dest->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
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
