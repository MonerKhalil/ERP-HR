<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\MainNotification;
use OwenIt\Auditing\Models\Audit;

class AuditObserver
{
    /**
     * Handle the Audit "created" event.
     *
     * @param Audit $audit
     * @return void
     */
    public function created(Audit $audit)
    {
        $auditData = $audit->toArray();
        $user = auth()->user();
        $tableName = app($auditData["auditable_type"])->getTable();
        if (!is_null($user)){
            $Data = [
                "model_id" => $auditData['auditable_id'],
                "model_type" => $auditData["auditable_type"],
                "table_name" => $tableName,
                "user_id" => $user->id,
                "user_name" => $user->name,
                "event" => $auditData['event'],
                "old_values" => $auditData['old_values'],
                "new_values" => $auditData['new_values'],
                "date" => now(),
                "route_name" => [
                    "show" => route("system.".$tableName.".show",$auditData['auditable_id']),
                    "index" => route("system.".$tableName.".index"),
                ],
            ];
            $users = User::query()->get();
            foreach ($users as $user) {
                if ($user->can("audit_".$tableName)||$user->can("all_".$tableName))
                    $user->notify(new MainNotification($Data,"audit"));
            }
        }
    }

}
