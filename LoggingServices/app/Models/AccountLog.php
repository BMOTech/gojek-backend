<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountLog extends Model
{
    //

    protected $table = 'account_log';

    public $timestamps = false;

    protected $fillable = [
        'UUID',
        'operationName',
        'completion_status',
        'exception_code',
        'exception_name',
        'sys_creation_date',
        'param1',
        'param2',
        'param3',
        'param4',
        'param5'
    ];
}
