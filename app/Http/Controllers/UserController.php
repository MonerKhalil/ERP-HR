<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MessagesFlash;
use App\HelpersClasses\MyApp;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const Folder = "users";
    const IndexRoute = "user.index";
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @author moner khalil
     */
    public function index(): Application|Factory|View
    {
        $data = MyApp::Classes()->Search->getData(User::query());
        return view("",compact('data'));
    }

    /**
     * @return Factory|View|Application
     * @author moner khalil
     */
    public function create(): Factory|View|Application
    {
        $roles = Role::query()->get(["id","name"]);
        return \view("",compact('roles'));
    }


    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @author moner khalil
     */
    public function store(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $dataRequest = Arr::except($request->validated(),['password','roles']);
            $dataRequest['password'] = Hash::make($request->password);
            if (isset($dataRequest['image'])){
                $dataRequest['image'] = MyApp::Classes()->storageFiles->Upload($dataRequest['image'],self::Folder);
            }
            DB::beginTransaction();
            $user = User::query()->create($dataRequest);
            $user->assignRole($request->roles);
            DB::commit();
            MessagesFlash::Success("create");
            return redirect()->route(self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            MessagesFlash::Errors($exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @param User $user
     * @return Factory|View|Application
     * @author moner khalil
     */
    public function show(User $user): Factory|View|Application
    {
        return \view("user.show",compact('user'));
    }

    /**
     * @param User $user
     * @return Factory|View|Application
     * @author moner khalil
     */
    public function edit(User $user): Factory|View|Application
    {
        $roles = Role::query()->get(["id","name"]);
        $userRole = $user->roles;
        return \view("user.show",compact('user','roles','userRole'));
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @author moner khalil
     */
    public function update(UserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        try {
            $dataRequest = Arr::except($request->validated(),['password','roles']);
            if (isset($dataRequest['image'])){
                $dataRequest['image'] = MyApp::Classes()->storageFiles->Upload($dataRequest['image'],self::Folder);
                MyApp::Classes()->storageFiles->deleteFile($user->image);
            }
            if (isset($request->password)){
                $dataRequest['password'] = Hash::make($request->password);
            }
            DB::beginTransaction();
            $user->update($dataRequest);
            $user->syncRoles($request->roles);
            DB::commit();
            MessagesFlash::Success("update");
            return redirect()->route(self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            MessagesFlash::Errors($exception->getMessage());
            return redirect()->back();
        }
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @author moner khalil
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $img = $user->image;
        $user->delete();
        MyApp::Classes()->storageFiles->deleteFile($img);
        MessagesFlash::Success("delete");
        return redirect()->route(self::IndexRoute);
    }
}
