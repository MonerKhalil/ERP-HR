<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

abstract class BaseModel extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    public abstract function validationRules();

    /**
     * @author moner khalil
     */
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        $user = \auth()->user();
        self::created(function ($model) use ($user) {
            if (!is_null($user)) {
                $model->created_by = $user->id;
            }
        });
        self::updated(function ($model) use ($user) {
            if (!is_null($user)) {
                $model->updated_by = $user->id;
            }
        });
    }

    public function userCreatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    public function userUpdatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "updated_by", "id");
    }
}
