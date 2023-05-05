<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentInformationRequest;
use App\Models\Address;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Document_information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Contact::class)->getTable());
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
        $contacts = $user->employee()->with('contacts')->get();

        return \response()->json([
            'contacts' => $contacts,
        ]);

        return view('dashboard.contact.index', compact('$contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dashboard.contact.create', [
            'address_type' => ["house", "clinic", "office"],
            'address_contry' => Address::all(),
            ///المدينة + المنطقة
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    //Contact
    public function store(ContactRequest $request)
    {
//        echo $request->all;
        //  $user=User::find(1);
//        $employee = Employee::where("id",$request->employee_id);
//        $employee->with('contacts')->create($request);
        // $contacts = $user->employee()->where("id",$request->employee_id)->contacts()->get();
        //$contacts->contacts;
//            $contacts =$user->employee()->with('contacts')->create($request);
//        // $contacts =Contact::create(array_merge($request->all(), $c));
//               return  \response()->json([
//            '$contacts'=>$contacts,
//        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('document_path')) {
                $contacts = Contact::create($request->except(['document_path', 'document_number', 'document_type']));
                $docList = $request->file('document_path');
                foreach ($docList as $photo) {
                    $newPhoto = time() . $photo->getClientOriginalName();
                    //$contacts->with('document_information')->create([
                    Document_information::create([
                        "contacts_id" => $contacts->id,
                        "document_path" => 'uploads/doc_contact/' . $newPhoto,
                        "document_number" => $request->document_number,
                        "document_type" => $request->document_type
                    ]);
                    $photo->move('uploads/doc_contact', $newPhoto);
                }
            } else {
                dd("not has file");
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }


        return \response()->json([
            '$contacts' => $contacts,
        ]);
        return redirect()->route('dashboard.employee.create')
            ->with('success', 'Category created!');/////
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $contact = Contact::findorFail($id);
        return view('dashboard.contact.edit', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Contact $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $contact = Contact::findorFail($id);
        return view('dashboard.contact.edite', compact('contact'), [
            'address_type' => ["house", "clinic", "office"],
            'address_contry' => Address::all(),
            ///المدينة + المنطقة
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Employee $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      dd($request->all());
//        $validator = Validator::make($request->all(), [
//            "private_number" => ['required', 'min:7', 'max:15', Rule::unique('contacts', 'private_number')],
//            "address_id" => ['required', Rule::exists('addresses', 'id')],
//            "employee_id" => ['required', Rule::exists('employees', 'id')],
//            "work_number" => ['required', 'min:7', 'max:15', Rule::unique('contacts', 'work_number')],
//            "address_details" => ['nullable', 'string', 'min:7', 'max:80'],
//            "address_type" => ['required', Rule::in(["house", "clinic", "office"])],
//            "email" => ['required', 'string', 'email'],
//            "document_type" => ['required', Rule::in(["family_card", "identification", "passport"])],
//            "document_number" => ['required', 'numeric', 'min:0', 'max:1000000'],
//            "document_path" => ['required', 'array']]);
//
//        //  dd($request->erros());
//        if($validator->fails())
//        {
//            return response()->json([
//                "error"=>$validator->errors()
//            ] );
//        }
        $contact_emp = Contact::findOrFail($id);
        //  dd($request->errors());
        $contact = $contact_emp->update([
            "address_id" => $request->address_id,
            "employee_id" => $request->employee_id,
            "work_number" => $request->work_number,
            "address_details" => $request->address_details,
            "private_number" => $request->private_number,
            "address_type" => $request->address_type,
            "email" => $request->email,
        ]);
        Document_information::update([
            "contacts_id" => $contact->id,
            "document_number" => $request->document_number,
            "document_type" => $request->document_type
        ]);
        //dd($contacts);

        // $contact->update($request->all());

        //  return redirect()->back();
    }


    public function deleteAllImage($id)
    {
        $_photo = Document_information::where("contacts_id", $id);
        if ($_photo !== null) {
            $pa = clone $_photo->get();
            foreach ($pa as $path) {
                unlink($path->path_photo);
            }
            $_photo->delete();
        }
    }

    public function deleteOneImage($id)
    {
        DB::beginTransaction();
        try {
            $_photo = Document_information::find($id);
            if ($_photo != null) {
                $teamp = clone $_photo;
                $_photo->delete();
                unlink($teamp->path_photo);
                DB::commit();
                return response(['message' => 'document deleted successfully']);
            } else {
                return response(['message' => 'document not found']);
            }
        } catch (\Exception $exception) {
            DB::rollback();
            return \response()->json([
                "Error" => $exception->getMessage()
            ], 401);
        }
    }

    public function addListImage(DocumentInformationRequest $request)
    {
        if ($request->hasFile('document_path')) {
            try {
                DB::beginTransaction();
                $contact = Contact::where("id", $request->contacts_id)->first();
                if ($contact != null) {
                    $photoList = $request->file('photo_list');
                    foreach ($photoList as $photo) {
                        $newPhoto = time() . $photo->getClientOriginalName();
                        Document_information::create([
                            "contacts_id" => $contact->id,
                            "document_path" => 'uploads/doc_contact/' . $newPhoto,
                            "document_number" => $request->document_number,
                            "document_type" => $request->document_type
                        ]);
                        $photo->move('uploads/doc_contact', $newPhoto);
                        DB::commit();
                    }
                    return response()->json([
                        "status" => true,
                        "message" => "image list add successfully"
                    ]);
                }

            } catch (\Exception $exception) {
                DB::rollBack();
            }
        }

    }

}
