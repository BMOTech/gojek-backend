<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\NotifConfigurationService;
use App\Services\SendEmailService;
use Log;

class SendContactController extends Controller
{
    protected $configurationService;
    protected $sendEmailService;

    public function __construct(NotifConfigurationService $configurationService,
                                SendEmailService $sendEmailService) {
        $this->configurationService = $configurationService;
        $this->sendEmailService = $sendEmailService;

    }

    public function opSendContact(Request $request) {

        Log::info('opSendContact initialized');

        $contactRequest = $request->input();
        $notifConfig = $this->configurationService->lookupContact($contactRequest);

        if(!$notifConfig) {
            return response()->json(['opSendContactRs'=> ['status' => 'businessError',
                'responseCode' => 'contact_not_found',
                'responseMessage' => 'contact configuration not found']]);
        }

        switch($contactRequest["opSendContactRq"]["contactType"]) {
            case "EMAIL" : {
                $this->sendEmailService->sendEmail($notifConfig, $contactRequest);
                break;
            }

            case "SMS" : {
                echo "SMS";
                break;
            }

        }

        return response()->json(['opSendContactRs'=> ['status' => 'success',
            'responseCode' => 'success_send_contact',
            'responseMessage' => 'success send contact']]);

    }
}
