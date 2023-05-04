<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MyApp;
use App\Http\Requests\EmployeeRequest;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Education_level;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;


class EmployeeController extends Controller
{
//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Employee::class)->getTable());
//    }


    public function index()
    {
       $employees = MyApp::Classes()->Search->getDataFilter(Employee::query()->whereNot("user_id",auth()->id()));
        return $this->responseSuccess("",compact("employees"));

    }


    public function create()
    {
        return view('dashboard.employeePI.create', [
            'gender' => ["male", "female"],
            'military_service' => ["exempt", "performer", "in_service"],
            'family_status' => ["married", "divorced", "single"],
            'address_type' => ["house", "clinic", "office"],
            "education"=>Education_level::query()->pluck("name","id")->toArray(),
        ]);
    }

    public function store(EmployeeRequest $request)
    {

        try {
            DB::beginTransaction();
            $employeePI =  Employee::create(Arr::except($request->validated(),
                [ "address_id","address_details",  "work_number","email","private_number","address_type",  "document_path"
                ,"id_ed_lev","grant_date","amount_impact_salary","college_name","document_education_path"
                ]));

            $contact = $employeePI->contacts()->create(Arr::only($request->validated(),
                ["address_id","address_details",  "work_number","email","private_number","address_type"]));
//            foreach ($request->document_path as $value){
//                if (isset($value["file"])){
//                    $value['file'] = MyApp::Classes()->storageFiles->Upload($value['file'],"documents/contact");
//                }
//                $contact->document_information()->create($value);
//            }
            $education_data=$employeePI->education_data()->create(Arr::only($request->validated(),["id_ed_lev","grant_date"
                ,"amount_impact_salary", "college_name"]));
            foreach ($request->document_education_path as $value){
                    $path= MyApp::Classes()->storageFiles->Upload($value,"documents/education");
                $education_data->document_education()->create([
                    "document_education_path"=>$path
                ]);
            }
            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            dd($e);
    }
        return redirect()->route('dashboard.employeeContact.create')
            ->with('success', 'Category created!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
       // $employee = Employee::find($id);
        return view('dashboard.employeePI.show', [
            'category' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $employee = Employee::findorFail($id);
        return view('dashboard.employeePI.edit', compact('employee'),[
            'gender' => ["male", "female"],
            'military_service' => ["exempt", "performer", "in_service"],
            'family_status' => ["married", "divorced", "single"]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update( $request->all() );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

    }

}
//"user_id" => $request->user_id,
//            "address_id" => $request->address_id,
//            "number_national" => $request->number_national,
//            "first_name" => $request->first_name,
//            "last_name" => $request->last_name,
//            "gender" => $request->gender,
//            "father_name" => $request->father_name,
//            "mother_name" => $request->mother_name,
//            "nationality" => $request->nationality,
//            "NP_registration" => $request->NP_registration,
//            "birth_place" => $request->birth_place,
//            "birth_date" => $request->birth_date,
//            "is_active" => $request->is_active,
//            "number_wives" => $request->number_wives,
//            "number_child" => $request->number_child,
//            "current_job" => $request->current_job,
//            "number_self" => $request->number_self,
//            "military_service" => $request->military_service,
//            "family_status" => $request->family_status,
//            "Number_insurance" => $request->Number_insurance,
//            "job_site" => $request->job_site,
//            "number_file"=>$request->number_file
