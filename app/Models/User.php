<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles,SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','image','is_active', 'email','password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Add relationships between tables section

    /**
     * Description: To check front end validation
     * @inheritDoc
     * @author moner khalil
     */
    public function validationRules(): \Closure
    {
        return function (BaseRequest $validator) {
            $user = auth()->user();
            $userCurrentId = $validator->route('user')->id ?? $user->id;
            $rules = [
                    "name" => ["required","string"],
                    "email" => ["required","email",Rule::unique("users","email")],
                    "image" => $validator->imageRule(false),
                ];
            if ($validator->isUpdatedRequest()){
                $rules['email'] =  ["required","email",Rule::unique("users","email")->ignore($userCurrentId)];
                $rules["old_password"] = ["sometimes","min:8","string"];
                $rules["new_password"] = [Rule::requiredIf(!is_null($validator->input('old_password'))),"min:8","string"];
                if ($user->can("update_users")){
                    $rules["password"] = ["sometimes","min:8","string"];
                    $rules["re_password"] = ["sometimes","same:password"];
                    $rules["role"] = ["required",Rule::exists("roles","id")];
                }
            }else{
                $rules["password"] = ["required","min:8","string"];
                $rules["re_password"] = ["required","string","same:password"];
                $rules["role"] = ["required",Rule::exists("roles","id")];
            }
            return $rules;
        };
    }
}
