<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Document_education;
use App\Models\Document_information;
use App\Models\Education_data;
use App\Http\Requests\Education_dataRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EducationDataController extends Controller
{
//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Education_data::class)->getTable());
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1);
        //$contacts =$user->employee()->with('contacts')->select(DB::raw(['contacts as x' ]))->first();
        $education_data = $user->employee()->with('education_data')->get();

        return \response()->json([
            'education_data' => $education_data,
        ]);

        return view('dashboard.contact.index', compact('$contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.education.create', [
            'education degree' => Education_level::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Education_dataRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('document_path')) {
                $education_data= Education_data::create($request->except(['document_path']));
                $docList = $request->file('document_path');
                foreach ($docList as $photo) {
                    $newPhoto = time() . $photo->getClientOriginalName();
                    Document_education::create([
                        "id_education" => $education_data->id,
                        "document_path" => 'uploads/doc_contact/' . $newPhoto,
                    ]);
                    $photo->move('uploads/doc_education', $newPhoto);
                }
            } else {
                dd("not has file");
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }


        return \response()->json([
            'Education_data' => $education_data,
        ]);
        return redirect()->route('dashboard.employee.create')
            ->with('success', 'Category created!');/////
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education_data  $education_data
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      //  $education_data = Education_data::findorFail($id);
        $education_data=Education_data::where(["id"=>$id])->with("document_education")->get();
        return view('dashboard.education.edit', compact('education_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education_data  $education_data
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education_data=Education_data::where(["id"=>$id])->with("document_education")->get();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education_data  $education_data
     * @return \Illuminate\Http\Response
     */
    public function update(Education_dataRequest $request, Education_data $education_data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education_data  $education_data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education_data $education_data)
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
