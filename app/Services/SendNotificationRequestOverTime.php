<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\OvertimeType;
use App\Models\User;
use App\Notifications\MainNotification;

class SendNotificationRequestOverTime
{
    public function sendNotify(Employee $employee,OvertimeType $overtimeType ,$route){
        $moderator_id = $employee->section->moderator_id;
        $message = __("request_overtime_msg") . $overtimeType->name;
        $data = [
            "from" => $employee->name,
            "body" => $message,
            "date" => now(),
            "route_name" => $route,
        ];
        $this->sendToUsersAdminLeaves($data,$moderator_id);
    }

    private function sendToUsersAdminLeaves($data,$moderator_id){
        $users = User::query()->get();
        foreach ($users as $user) {
            if ($user->can("all_overtimes") || $user->id == $moderator_id)
                $user->notify(new MainNotification($data,__("request_overtime")));
        }
    }
}
