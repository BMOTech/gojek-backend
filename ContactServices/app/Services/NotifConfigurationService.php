<?php

/**
 * Created by PhpStorm.
 * User: Pradhany
 * Date: 7/23/2016
 * Time: 6:35 AM
 */

namespace App\Services;

use App\Models\Contact as Contact;
class NotifConfigurationService
{

    public function lookupContact($contactRequest) {

        $serviceName = $contactRequest['opSendContactRq']['serviceName'];
        $operationName = $contactRequest['opSendContactRq']['operationName'];
        $contactType = $contactRequest['opSendContactRq']['contactType'];
        $contactName = $contactRequest['opSendContactRq']['contactName'];

        $query = Contact::where('serviceName', '=', $serviceName,
            "and", "operationName", "=", $operationName,
            "and", "contactType", "=", $contactType,
            "and", "contactName", "=", $contactName)->first();

        return $query;
    }

}
