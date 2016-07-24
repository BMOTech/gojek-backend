<?php
/**
 * Created by PhpStorm.
 * User: Pradhany
 * Date: 7/23/2016
 * Time: 10:00 PM
 */

namespace App\Services;

use Mail;

class SendEmailService
{

    public function sendEmail($notifConfig, $contactRequest) {

        $data = array(
            'name' => $notifConfig["contactValue"],
            'from' => $notifConfig["contactSender"],
            'to' => $contactRequest["opSendContactRq"]["contactReceiver"],
            'subject' => $notifConfig["property1"]
        );

        Mail::send('email', $data, function ($message) use ($data){

            $message->from($data["from"]);
            $message->to($data["to"]);
            $message->subject($data["subject"]);

        });
    }


}