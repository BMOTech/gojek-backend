<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected  $table = "contact_configuration";

    public $timestamps = false;

    protected $fillable = [
        'serviceName',
        'operationName',
        'contactType',
        'contactSender',
        'contactName',
        'contactValue',
        'sys_creation_date',
        'sys_update_date',
        'property1'
    ];
}
