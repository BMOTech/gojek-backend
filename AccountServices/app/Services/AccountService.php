<?php
/**
 * Created by PhpStorm.
 * User: Pradhany
 * Date: 7/20/2016
 * Time: 7:33 PM
 */

namespace App\Services;

use App\Models\Account as Account;
use DB;

class AccountService
{

    public function findRegisteredAccount($email) {
        $query = Account::where('email', '=', $email)->first();

        return $query;
    }

    public function insertAccount($account) {

        DB::table('visitor_account')->insert($account);
//        Account::create($account);

    }
}