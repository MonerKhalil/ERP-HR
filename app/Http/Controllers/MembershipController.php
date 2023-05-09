<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Http\Controllers\Controller;
use App\Http\Requests\MembershipRequest;
use App\Models\Membership_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Exception;

class MembershipController extends Controller
{
//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Membership::class)->getTable());
//    }


    public function index()
    {
        //
    }


    public function create()
    {
        return view('dashboard.membership.create', [
            'membership_types' => Membership_type::query()->pluck('name','id'),
        ]);
    }


    public function store(MembershipRequest $request)
    {
        try {
            DB::beginTransaction();
            Membership::create($request->validated());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard.membership.create')
                ->with('info', 'Record not found!');
        }
        return redirect()->route('dashboard.membership.create')
            ->with('success', 'membership created!');
    }


    public function show($id)
    {
        $membership = Membership::findOrFail($id);
        return view('dashboard.membership.show', [
            'membership' => $membership
        ]);
    }


    public function edit($id)
    {
        try {
            $membership = Membership::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('dashboard.membership.index')
                ->with('info', 'Record not found!');
        }
        return view('dashboard.membership.edite', compact('membership'), [
            'membership_types' => Membership_type::query()->pluck('name','id'),
        ]);
    }


    public function update(MembershipRequest $request, $id)
    {
        $membership = Membership::find($id);
        if (!is_null($membership))
            $membership->update($request->validated());
        return Redirect::route('dashboard.membership.index')
            ->with('success', 'Contract updated!');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Membership::destroy($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard.membership.index')
                ->with('info', 'error!');
        }
        return Redirect::route('dashboard.membership.index')
            ->with('success', 'Contract deleted!');
    }


    public function trash()
    {
        $membership = Membership::onlyTrashed()->paginate();
        return view('dashboard.membership.trash', compact('membership'));
    }

    public function restore($id)
    {
        $membership = Membership::onlyTrashed()->paginate();
        $membership->restore();
        return redirect()->route('dashboard.membership.trash')
            ->with('success', 'Contract restored!');
    }

    public function forceDelete($id)
    {
        $membership = Membership::onlyTrashed()->findOrFail($id);
        $membership->forceDelete();
        return redirect()->route('dashboard.membership.trash')
            ->with('success', 'membership deleted forever!');
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
