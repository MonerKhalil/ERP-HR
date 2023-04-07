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
        $data = MyApp::Classes()->Search->getData(User::query()->whereNot("id",auth()->id()));
        return $this->responseSuccess("",compact("data"));
    }

    /**
     * @return Response|RedirectResponse|null
     * @author moner khalil
     */
    public function create(): Response|RedirectResponse|null
    {
        $roles = Role::query()->get(["id","name"]);
        return $this->responseSuccess("",compact("roles"));
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
            $dataRequest = Arr::except($request->validated(),['password','roles']);
            $dataRequest['password'] = Hash::make($request->password);
            if (isset($dataRequest['image'])){
                $dataRequest['image'] = MyApp::Classes()->storageFiles->Upload($dataRequest['image'],self::Folder);
            }
            DB::beginTransaction();
            $user = User::query()->create($dataRequest);
            $user->assignRole($request->roles);
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
        return $this->responseSuccess("user.show",compact('user'));
    }

    /**
     * @param User $user
     * @return Response|RedirectResponse|null
     * @author moner khalil
     */
    public function edit(User $user): Response|RedirectResponse|null
    {
        $roles = Role::query()->get(["id","name"]);
        $userRole = $user->roles;
        return $this->responseSuccess("user.show",compact('user','roles','userRole'));
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
