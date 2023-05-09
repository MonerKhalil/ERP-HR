<?php

namespace App\Http\Controllers;

use App\Models\Language_skill;
use App\Http\Controllers\Controller;
use App\Http\Requests\Language_skillRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Exception;

class LanguageSkillController extends Controller
{
//    public function __construct()
//    {
//        $this->addMiddlewarePermissionsToFunctions(app(Language_skill::class)->getTable());
//    }


    public function index()
    {


    }


    public function create()
    {
        return view('dashboard.contract.create');
    }


    public function store(Language_skillRequest $request)
    {
        try {
            DB::beginTransaction();
            Language_skill::create($request->validated());
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard.language_skill.create')
                ->with('info', 'Record not found!');
        }
        return redirect()->route('dashboard.language_skill.create')
            ->with('success', 'lang created!');
    }


    public function show($id)
    {
        $lang = Language_skill::findOrFail($id);
        return view('dashboard.categories.show', [
            'language' => $lang
        ]);
    }

    public function edit($id)
    {
        try {
            $lang = Language_skill::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('dashboard.contract.index')
                ->with('info', 'Record not found!');
        }
        return view('dashboard.contract.edite',compact('lang'));
    }

    public function update(Language_skillRequest $request, $id)
    {
        $lang = Language_skill::find($id);
        if (!is_null($lang))
            $lang->update($request->validated());
        return Redirect::route('dashboard.language_skill.index')
            ->with('success', 'lang updated!');
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Language_skill::destroy($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard.language_skill.index')
                ->with('info', 'error!');
        }
        return Redirect::route('dashboard.language_skill.index')
            ->with('success', 'language_skill deleted!');
    }


    public function trash()
    {
        $lang = language_skill::onlyTrashed()->paginate();
        return view('dashboard.language_skill.trash', compact('lang'));
    }

    public function restore($id)
    {
        $contract = language_skill::onlyTrashed()->findOrFail($id);
        $contract->restore();
        return redirect()->route('dashboard.language_skill.trash')
            ->with('succes', 'language_skill restored!');
    }

    public function forceDelete($id)
    {
        $contract = language_skill::onlyTrashed()->findOrFail($id);
        $contract->forceDelete();
        return redirect()->route('dashboard.language_skill.trash')
            ->with('success', 'language_skill deleted forever!');
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
