<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\sendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sendMailNotification(){
        if(Post::create()){
            $post = Post::first() ;
        }



        $data= [
            'body'=>'there is new post',
            'text'=>'chech it',
            'thankyou'=>'Thank you'
        ];
        Notification::send($post, new sendEmailNotification($data));

        // $notification = new sendEmailNotification();
        // Notification::channel('database')->sendNow($notification);
        // Notification::channel('mail')->send($notification);

    }
}
