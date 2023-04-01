<?php

namespace App\Models;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
            $rules = [
                    "name" => ["required","string"],
                    "email" => ["required","email",Rule::unique("users","email")],
                    "password" => ["required","min:8","string"],
                    "image" => $validator->imageRule(),
                    "roles" => ["required","array"],
                    "roles.*" => [Rule::exists("roles","id")],
                ];
            if ($validator->isUpdatedRequest()){
                $rules['email'] =  ["required","email",Rule::unique("users","email")->ignore($validator->route('user')->id)];
                $rules['password'] = ["sometimes","min:8","string"];
            }
            return $rules;
        };
    }
}
