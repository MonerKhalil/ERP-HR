<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\User;
use App\Notifications\MainNotification;

class SendNotificationRequestLeave
{
    public function sendNotify(Employee $employee,LeaveType $leaveType ,$route){
        $moderator_id = $employee->section->moderator_id;
        $message = __("request_leave_msg") . $leaveType->name;
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
            if ($user->can("all_leaves") || $user->id == $moderator_id)
                $user->notify(new MainNotification($data,__("request_leave")));
        }
    }
}
