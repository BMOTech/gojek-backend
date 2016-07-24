<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //

    protected $table = 'visitor_account';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'occupation',
        'sys_creation_date'
    ];
}
