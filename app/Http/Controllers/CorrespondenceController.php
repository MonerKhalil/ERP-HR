<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\Models\Correspondence;
use App\Http\Controllers\Controller;
use App\Http\Requests\CorrespondenceRequest;
use App\Models\Correspondence_source_dest;
use App\Models\Employee;
use App\Models\Sections;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CorrespondenceController extends Controller
{
    const Folder = "users";
    const IndexRoute = "system. Correspondence.index";
//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Correspondence::class)->getTable());
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //  $q= Correspondence::with(["employee","section","employees","sections"])->get();
      $q= Correspondence::with(["employees"])->get();



        return  Response()->json([$q]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->responseSuccess("System.Pages.Actors.HR_Manager.addContract", $this->shareByBlade());

    }
    private function shareByBlade(){
       $type=['internal','external'];
        $type_connection=["email","fax","hand"];
        $sections = Sections::query()->pluck("name", "id")->toArray();
        return compact('type', 'type_connection', 'sections');

      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorrespondenceRequest $request)
    {

        try {
            DB::beginTransaction();
            $data = Arr::except($request->validated(), ["date", "section_id_dest","source_dest_section_id","source_dest_type"]);
            $correspondence=Correspondence::query()->create($data);
            $current_section_id = Employee::findOrFail(Auth()->id())->section_id;
            $sourceDestData = [
                "source_dest_type" => $request->source_dest_type,
               "employee_id" => Auth()->id(),
                "section_id" => $current_section_id,
                "section_id_dest" => $request->section_id_dest,
                "data" => $request->date,
                "correspondences_id" => $correspondence->id,
            ];
             $final=Correspondence_source_dest::query()->create($sourceDestData);
            DB::commit();
            return  Response()->json(["true"=>$correspondence,"many"=>$final]);
          //  return $this->responseSuccess(null,null,"create",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            return  Response()->json(["error"=>$exception->getMessage()]);
            throw new MainException($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Correspondence  $correspondence
     * @return \Illuminate\Http\Response
     */
    public function show(Correspondence $correspondence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Correspondence  $correspondence
     * @return \Illuminate\Http\Response
     */
    public function edit(Correspondence $correspondence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Correspondence  $correspondence
     * @return \Illuminate\Http\Response
     */
    public function update(CorrespondenceRequest $request, Correspondence $correspondence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Correspondence  $correspondence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Correspondence $correspondence)
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
