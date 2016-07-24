<?php

namespace App\Http\Controllers;

use App\Services\LoggingInterfaceService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\AccountService;
use App\Services\ContactInterfaceService;

class AccountController extends Controller
{
    protected $accountService;
    protected $contactInterfaceService;
    protected $loggingInterfaceService;

    public function __construct(AccountService $accountService,
                                ContactInterfaceService $contactInterfaceService,
                                LoggingInterfaceService $loggingInterfaceService) {

        $this->accountService = $accountService;
        $this->contactInterfaceService = $contactInterfaceService;
        $this->loggingInterfaceService = $loggingInterfaceService;
    }

    public function opRegister(Request $request)
    {

        $account = $request->input();
        $name = $account['opRegisterRq']['name'];
        $email = $account['opRegisterRq']['email'];
        $phone = $account['opRegisterRq']['phone'];
        $occupation = $account['opRegisterRq']['occupation'];


        $query = $this->accountService->findRegisteredAccount($email);

        $httpHeaders = null;
        $httpBodyContact = null;
        $httpBodyLogging = null;

        if(!$query) {

            $this->accountService->insertAccount($account);

            // SEND CONTACT (EMAIL)
            $httpHeaders = [
                'Content-Type'     => 'application/json',
            ];

            $httpBodyContact = [
                'opSendContactRq' => [
                    'serviceName' => 'AccountServices',
                    'operationName' => 'opRegister',
                    'contactType' => 'EMAIL',
                    'contactName' => 'SUCCESS_REG',
                    'contactReceiver' => $email
                ]
            ];

            $this->contactInterfaceService->requestContactService($httpHeaders, $httpBodyContact, 'POST', 'SYNC');
            // SEND CONTACT (EMAIL)

            // SEND LOG
            $httpBodyLogging = [
                'opLoggingRq' => [
                    "operationName" => "opRegisterAccount",
		            "completion_status" => "success",
                    "param1" => $name,
		            "param2" => $email,
		            "param3" => $phone,
		            "param4" => $occupation
                ]
            ];

            $this->loggingInterfaceService->requestLoggingService($httpHeaders, $httpBodyLogging, 'POST', 'SYNC');

            return response()->json(['opRegisterRs'=> ['status' => 'success',
                'responseCode' => 'success_registration',
                'responseMessage' => 'success register account'
            ]]);




        } else {

            $httpLoggingFailed = [
                'opLoggingRq' => [
                    "operationName" => "opRegisterAccount",
		            "completion_status" => "businessError",
		            "exception_code" => "bizzErr_already_reg",
		            "exception_name" => "account already registered",
                    "param1" => $name,
                    "param2" => $email,
                    "param3" => $phone,
                    "param4" => $occupation
                ]
            ];

            $this->loggingInterfaceService->requestLoggingService($httpHeaders, $httpLoggingFailed, 'POST', 'SYNC');

            return response()->json(['opRegisterRs'=> ['status' => 'businessError',
                'responseCode' => 'bizzErr_already_reg',
                'responseMessage' => 'account already registered'
            ]]);
        }
    }
}
