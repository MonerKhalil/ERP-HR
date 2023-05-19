<?php

namespace App\Http\Controllers;

use App\HelpersClasses\MyApp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NotificationsController extends Controller
{
    public function getNotifications(Request $request){
        $user = auth()->user();
        $data = match ($request->input("status")) {
            "Read" => $user->readNotifications(),
            "unRead" => $user->unreadNotifications(),
            default => $user->notifications(),
        };
        $data = MyApp::Classes()->Search->dataPaginate($data->whereNot("data->type","audit"));

        return $this->responseSuccess("notifications.show",compact("data"));
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
