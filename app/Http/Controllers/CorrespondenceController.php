<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Models\Correspondence;
use App\Http\Controllers\Controller;
use App\Http\Requests\CorrespondenceRequest;
use App\Models\Correspondence_source_dest;
use App\Models\Employee;
use App\Models\SectionExternal;
use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CorrespondenceController extends Controller
{
    const Folder = "users";
    const IndexRoute = "system. Correspondence.index";
    public function __construct()
      {
        $this->addMiddlewarePermissionsToFunctions(app(Correspondence::class)->getTable());
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $data = Correspondence::with(["employees"])->get();
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
       // $type_connection=["email","fax","hand"];
        $sections = Sections::query()->pluck("name", "id")->toArray();
        $sections_external = SectionExternal::query()->pluck("name", "id")->toArray();
        return compact('type',  'sections','sections_external');
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
            $data = Arr::except($request->validated());
            if($request->hasFile("path_file")){
                $path = MyApp::Classes()->storageFiles
                    ->Upload($request['path_file'],"correspondence/document_Correspondence");
                $data['path_file']=$path;
            }
            $data["origin_number"]=343242;
            $correspondence=Correspondence::query()->create($data);

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
