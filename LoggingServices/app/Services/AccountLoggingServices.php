<?php

/**
 * Created by PhpStorm.
 * User: Pradhany
 * Date: 7/22/2016
 * Time: 8:00 AM
 */

namespace App\Services;
use DB;
use App\Models\AccountLog as Log;

class AccountLoggingServices
{

    public function insertLog($log) {
        DB::table('account_log')->insert($log);
//        Log::create($log);
    }
}