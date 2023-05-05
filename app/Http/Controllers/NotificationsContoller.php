<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MyApp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NotificationsContoller extends Controller
{
    public function getNotifications(Request $request){
        $user = auth()->user();
        $data = [];
        switch($request->input("status")){
            case "Read" :
                $data = $user->readNotifications();
                break;
            case "unRead" :
                $data = $user->unreadNotifications();
                break;
            default:
            $data = $user->notifications();
        }
        return $this->responseSuccess("System.Pages.Actors.notification",compact("data"));
    }

    public function clearNotifications(){
        auth()->user()->notifications()->delete();
        return $this->responseSuccess(null,null,"delete",MyApp::RouteHome);
    }

    /*
    * @descriptions : Ajax Request -> Work Update Notification To Read
    */
    public function editNotificationsToRead()
    {
        auth()->user()->unreadNotifications()->update([
            "read_at"=>Carbon::now()
        ]);
        return response()->json(["message"=>"Success Read Notification"]);
    }

}
