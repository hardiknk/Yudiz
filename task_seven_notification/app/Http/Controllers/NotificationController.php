<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\BrodcastNotification;
use App\Notifications\CustomChannelNotification;
use App\Notifications\DatabaseNotification;
use App\Notifications\InvoicePaid;
use App\Notifications\InvoicePaidNotificationMarkDown;
use App\Notifications\SlackNotification;
use App\Notifications\VongasNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    //
    public function send_notificaion()
    {

        $user = User::inRandomOrder()->first();
        ////==============notification via email ===============
        //send using the notifiable trait file send sussfully
        //also use for passing the view message 
        // $user->notify(new InvoicePaid());
        //============send notification using the facade 
        // Notification::send($user, new InvoicePaid());

        //// ===========quaable notification must start quework and implenet shoudque
        //send the notification using the que it only use when send multiple and taking the more time 
        // $user->notify((new InvoicePaid())->delay(now()->addSeconds(5)));


        // on demand notification user data is not store database random send the message to particular email addres
        // =============on demand notificaiton
        // Notification::route('mail', 'taylor@example.com')
        //     ->notify(new InvoicePaid());
        // Notification::route('mail', [
        //     'barrett@example.com' => 'Barrett Blair',
        // ])->notify(new InvoicePaid());
        // //=================email notification end =================

        // // ==============mark down mail template ==================
        //after markdown template 
        // $user->notify(new InvoicePaidNotificationMarkDown());
        // dd("hiih ardik notification send ");
        // ==================mark down mail template end =============



        // // =============send notification via database start  ============
        //this line is store the notification after we access it
        // //php artisan notifications:table
        // $user->notify(new DatabaseNotification());

        //acess the notification  
        //here 44 number id is exists in notification table
        // $user_notificaiton_data = User::find(44);
        // dd($user_notificaiton_data->notifications);
        //here all notification 
        // foreach ($user_notificaiton_data->notifications as $notification) {
        //     echo $notification->type;
        //     echo $notification->notifiable_id;
        //     print_r($notification->data);
        // }

        //if retrive only unread notification 
        // foreach ($user_notificaiton_data->unreadNotifications as $notification) {
        //     echo $notification->type;
        //     echo $notification->notifiable_id;
        // }

        //if we want to read the notification 
        //multiple notification read 
        // $user_notificaiton_data = User::find(44);
        // foreach ($user_notificaiton_data->unreadNotifications as $notification) {
        //     $notification->markAsRead();
        // }
        //single user read 
        // $user_notificaiton_data = User::find(10);
        // $user_notificaiton_data->unreadNotifications->markAsRead();
        //delete the notification 
        //here also delete the all notification not single 10 id of user records delete from notification table 
        // $user_notificaiton_data = User::find(10);
        // $user_notificaiton_data->notifications()->delete();

        // // ==============end of the database notificaion ===========



    }

    public function sendSms(Request $request)
    {

        $user = User::find(1);
        // dd($user->prefers_sms);
        $user->notify(new VongasNotification());
    }

    public function sendSlack()
    {

        $user = User::find(1);
        // Log::channel('slack')->info("Hello From Hardik");
        // $user->notify(new SlackNotification($user));
        Notification::send($user, new SlackNotification($user));
    }

    public function customChannel()
    {

        $user = User::find(1);
        $user->notify(new CustomChannelNotification());
    }
    public function brodNotification()
    {

        $user = User::find(1);
        $user->notify(new BrodcastNotification());
    }
}
