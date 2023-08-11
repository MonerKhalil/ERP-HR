<?php

namespace App\Services;

use App\Models\Attendance;

class AttendanceService
{
    public function checkIn(){
        $user = auth()->user()->employee;
        $attendance = Attendance::with("employee")
            ->where("employee_id",$user->id)
            ->whereDate("created_at",now()->toDateString())
            ->first();
        if (is_null($attendance)){
            $attendance = Attendance::create([
                "employee_id" => $user->id,
                "check_in" => now(),
            ]);
        }else{
            if (!is_null($attendance->check_in)){

            }
        }
    }

    public function checkOut(){

    }
}
