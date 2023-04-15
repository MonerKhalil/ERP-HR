<?php

namespace App\Http\Controllers;

use App\Exceptions\MainException;
use App\HelpersClasses\MyApp;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Exceptions\UnauthorizedException;

class UserController extends Controller
{
    const Folder = "users";
    const IndexRoute = "users.index";

    public function __construct()
    {
        $this->addMiddlewarePermissionsToFunctions(app(User::class)->getTable());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response|RedirectResponse|null
     * @author moner khalil
     */
    public function index(): Response|RedirectResponse|null
    {
        $users = MyApp::Classes()->Search->getDataFilter(User::query()->whereNot("id",auth()->id()));
        return $this->responseSuccess("System.Pages.Actors.Admin.viewUsers",compact("users"));
    }

    /**
     * @return Response|RedirectResponse|null
     * @author moner khalil
     */
    public function create(): Response|RedirectResponse|null
    {
        $roles = Role::query()->pluck('name','id')->toArray();
        return $this->responseSuccess("System.Pages.Actors.Admin.addUser",compact("roles"));
    }


    /**
     * @param UserRequest $request
     * @return RedirectResponse
     * @throws MainException
     * @author moner khalil
     */
    public function store(UserRequest $request): RedirectResponse
    {
        try {
            $dataRequest = Arr::except($request->validated(),['password','role']);
            $dataRequest['password'] = Hash::make($request->password);
            if (isset($dataRequest['image'])){
                $dataRequest['image'] = MyApp::Classes()->storageFiles->Upload($dataRequest['image'],self::Folder);
            }
            DB::beginTransaction();
            $user = User::query()->create($dataRequest);
            $user->assignRole($request->role);
            DB::commit();
            return $this->responseSuccess(null,null,"create",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    /**
     * @param User $user
     * @return Response|RedirectResponse|null
     * @author moner khalil
     */
    public function show(User $user): Response|RedirectResponse|null
    {
        $auth = auth()->user();
        if ($auth->id == $user->id || $auth->can("read_users") || $auth->can("all_users")){
            $roles = Role::query()->pluck('name','id')->toArray();
            return $this->responseSuccess("System.Pages.Actors.profile",compact('user','roles'));
        }
        throw UnauthorizedException::forPermissions(["read_users","all_users"]);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     * @throws MainException
     * @author moner khalil
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        try {
            $dataRequest = Arr::except($request->validated(),['password','role']);
            if (isset($dataRequest['image'])){
                $dataRequest['image'] = MyApp::Classes()->storageFiles->Upload($dataRequest['image'],self::Folder);
                MyApp::Classes()->storageFiles->deleteFile($user->image);
            }
            if (isset($request->password)){
                $dataRequest['password'] = Hash::make($request->password);
            }
            DB::beginTransaction();
            $user->update($dataRequest);
            $user->syncRoles($request->role);
            DB::commit();
            return $this->responseSuccess(null,null,"update",self::IndexRoute);
        }catch (\Exception $exception){
            DB::rollBack();
            throw new MainException($exception->getMessage());
        }
    }

    /**
     * @param User $user
     * @return RedirectResponse
     * @author moner khalil
     */
    public function destroy(User $user): RedirectResponse
    {
        $img = $user->image;
        $user->delete();
        MyApp::Classes()->storageFiles->deleteFile($img);
        return $this->responseSuccess(null,null,"delete",self::IndexRoute);
    }
}
