<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

class NotificationController extends Controller
{
    //


    public function index(Request $request)
    {
        $email = $request->get("email");
        if($email == null)
        {
            return ["error" => "You are not logged in"];
        }else{
            $notifications = Notification::where("email", $email)->get();
            return ["data" => $notifications];
        }
    }


    public function markAsRead(Request $request)
    {
        $email = $request->get("email");
        if($email == null)
        {
            return ["error" => "You are not logged in"];
        }else{
            $notification = Notification::where(['email'=>$email,'is_read'=>false]);
            if($notification == null)
            {
                return ["error" => "Notification not found"];
            }else{
                $notification->update(['is_read'=>true]);
                return ["data" => $notification];
            }
        }
    }
}
