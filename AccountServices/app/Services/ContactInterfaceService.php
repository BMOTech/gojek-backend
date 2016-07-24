<?php
/**
 * Created by PhpStorm.
 * User: Pradhany
 * Date: 7/24/2016
 * Time: 2:15 PM
 */

namespace App\Services;
use GuzzleHttp\Client;

class ContactInterfaceService
{
    public function requestContactService($httpHeaders, $httpBody, $httpMethod, $requestMode) {
        $encodedHttpBody = json_encode($httpBody);

        $client = new Client();
        $response = null;

        if($requestMode == 'SYNC') {
            $response = $client->request($httpMethod, 'http://localhost:8383/ContactServices/opSendContact',
                ['headers'=>$httpHeaders,'body' => $encodedHttpBody]);

            return $response;
        } else {
            // Request Async

            return $response;
        }

    }


}