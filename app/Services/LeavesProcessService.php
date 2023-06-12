<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\LeaveType;
use Illuminate\Support\Carbon;

class LeavesProcessService
{
    /**
     * @param $request
     * @param Employee $employee
     * @param LeaveType $leaveType
     * @return bool
     * @throws \Exception
     * @author moner khaill
     */
    public function checkAllProcess($request , Employee $employee, LeaveType $leaveType){
        $check = true;
        if ($leaveType->leave_limited){
            if ($leaveType->is_hourly){
                $check = $this->checkCanTakeLeaveAndIsHours($request,$employee,$leaveType);
            }else{
                $check = $this->checkCanTakeLeave($request,$employee,$leaveType);
            }
        }
        if (!$check){
            throw new \Exception(__("err_leaves_count"));
        }
        if (!$this->checkGender($employee,$leaveType)){
            throw new \Exception(__("err_leaves_gender"));
        }
        return true;
    }

    private function checkCanTakeLeave($request ,Employee $employee,LeaveType $leaveType){
        $leavesCaninYears = $leaveType->max_days_per_years;
        if ($leaveType->years_employee_services!=0){
            if ( $leaveType->years_employee_services > $employee->count_years_services/12 ){
                return false;
            }
        }
        if (!is_null($leaveType->number_years_services_increment_days) && $leaveType->count_days_increment_days!=0){
            if ($leaveType->number_years_services_increment_days <= $employee->count_years_services){
                $leavesCaninYears += $leaveType->count_days_increment_days;
            }
        }
        $from = Carbon::parse($request->from_date)->format("Y-m-d");
        $to = Carbon::parse($request->to_date)->format("Y-m-d");
        $count_days = Carbon::createFromFormat("Y-m-d",$to)->diffInDays($from);
        if ($count_days > $leavesCaninYears){
            return false;
        }
        $countLeavesEmployee = $employee->leaves()
            ->whereYear("created_at","=",now()->year)->get();
        $count_days = 0;
        $count_hours = 0;
        $count_minute = 0;
        foreach ($countLeavesEmployee as $item){
            $count_days += $item->count_days;
            $count_hours += $item->count_hours;
            $count_minute += $item->minutes;
        }
        $count_hours_work_in_days = $employee->section()->first()->work_setting()->first()->count_hours_work_in_days;

        if ($count_days > $leavesCaninYears){
            return false;
        }
        return true;
    }

    private function checkCanTakeLeaveAndIsHours($request ,Employee $employee,LeaveType $leaveType):bool{
        if ($leaveType->is_hourly && !is_null($request->from_hour)){
            $h_from = Carbon::parse($request->from_hour)->format("H:i:s");
            $h_to = Carbon::parse($request->to_hour)->format("H:i:s");
//            $count_hours_work_in_days = Carbon::createFromFormat("H:i:s",$h_to)->diffInHours($h_from);
            $count_minute_work_in_days = Carbon::createFromFormat("H:i:s",$h_to)->diffInMinutes($h_from);
            $max_minutes_per_day = $leaveType->max_hours_per_day * 60;
            if ($count_minute_work_in_days > $max_minutes_per_day){
                return false;
            }
//            if ($leaveType->max_hours_per_day < $count_hours_work_in_days){
//                return false;
//            }
//            if ( ($leaveType->max_hours_per_day == $request->count_hours)
//                &&
//                (!is_null($request->minutes))
//            ){
//                return false;
//            }
        }
        return true;
    }

    private function checkGender(Employee $employee,LeaveType $leaveType){
        if ($leaveType->gender != "any"){
            return $employee->gender == $leaveType->gender;
        }
        return true;
    }
}
