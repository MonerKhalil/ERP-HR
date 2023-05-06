<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Http\Requests\DataAllEmployeeRequest;
use App\Http\Requests\EmployeeRequest;
use App\Models\Education_level;
use App\Models\Employee;
use App\Models\Sections;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    const Folder = "users";
    const IndexRoute = "employees.index";

    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(Employee::class)->getTable());
    }

    public function index()
    {
        $employees = MyApp::Classes()->Search->getDataFilter(Employee::query()->whereNot("user_id",auth()->id()));
        return $this->responseSuccess("",compact("employees"));
    }

    public function create()
    {
        return $this->responseSuccess("",$this->shareByBlade());
    }

    /**
     * @param DataAllEmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|null
     * @throws MainException
     * @author moner khalil
     */
    public function store(DataAllEmployeeRequest $request)
    {
        try {
            DB::beginTransaction();
            $employee = Employee::create($request->employeeData());
            $contact = $employee->contact()->create($request->contactDate());
            if (!is_null($request->document_contact)){
                foreach ($request->document_contact as $item){
                    $temp = $item;
                    if (isset($temp['document_path'])){
                        $temp['document_path'] = MyApp::Classes()->storageFiles
                            ->Upload($temp['document_path'],"employees/document_contact");
                    }
                    $contact->document_contact()->create($temp);
                }
            }
            $education_data = $employee->education_data()->create($request->educationData());
            if (!is_null($request->document_education_path)){
                foreach ($request->document_education_path as $item){
                    $temp = $item;
                    $temp = MyApp::Classes()->storageFiles->Upload($temp,"employees/document_education");
                    $education_data->document_education()->create([
                        "document_education_path" => $temp,
                    ]);
                }
            }
            DB::commit();
            return $this->responseSuccess(null,null,"create",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    /**
     * @param null $employee
     * @author moner khalil
     */
    public function show($employee = null)
    {
        $employeeQuery = Employee::with([
            "contact" => function($q){
                return $q->with(["document_contact","address"])->get();
            },
            "education_data" => function($q){
                return $q->with(["document_education","education_level"])->get();
            },
        ]);
        $employee = is_null($employee) ? $employeeQuery->where("user_id",auth()->id())->firstOrFail()
            : $employeeQuery->findOrFail($employee);
        return $this->responseSuccess("",compact("employee"));
    }

    public function edit($employee = null)
    {
        $employeeQuery = Employee::with([
            "contact" => function($q){
                return $q->with(["document_contact","address"])->get();
            },
            "education_data" => function($q){
                return $q->with(["document_education","education_level"])->get();
            },
        ]);
        $data = $this->shareByBlade();
        $data['employee'] = is_null($employee) ? $employeeQuery->where("user_id",auth()->id())->firstOrFail()
            : $employeeQuery->findOrFail($employee->id);
        return $this->responseSuccess("",$data);
    }

    public function update(EmployeeRequest $request, $employee = null)
    {
        $employeeQuery = Employee::query();
        $employee = is_null($employee) ? $employeeQuery->where("user_id",auth()->id())->firstOrFail()
            : $employeeQuery->findOrFail($employee->id);
        $employee->update($request->validated());
        return $this->responseSuccess(null,null,"update",self::IndexRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }

    private function shareByBlade(){
        $gender = ["male", "female"];
        $military_service = ["exempt", "performer", "in_service"];
        $family_status = ["married", "divorced", "single"];
        $address_type = ["house", "clinic", "office"];
        $document_type = ["family_card","identification","passport"];
        $education_level = Education_level::query()->pluck("name","id")->toArray();
        $countries = countries();
        $sections = Sections::query()->pluck("name","id")->toArray();
        return compact('sections','countries','gender','military_service'
            ,'family_status','address_type','education_level','document_type');
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
