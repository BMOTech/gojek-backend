<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\AccountLoggingServices;

class AccountLoggingController extends Controller
{
    protected $accountloggingServices;

    public function __construct(AccountLoggingServices $accountloggingServices) {
        $this->accountloggingServices = $accountloggingServices;
    }

    public function opLogAccount(Request $request){
        $log = $request->input();
        $this->accountloggingServices->insertLog($log);
    }
}
