<?php
/**
 * Created by PhpStorm.
 * User: Pradhany
 * Date: 7/25/2016
 * Time: 6:16 AM
 */

namespace App\Services;
use GuzzleHttp\Client;

class LoggingInterfaceService
{
    public function requestLoggingService($httpHeaders, $httpBody, $httpMethod, $requestMode) {
        $encodedHttpBody = json_encode($httpBody);

        $client = new Client();
        $response = null;

        if($requestMode == 'SYNC') {
            $response = $client->request($httpMethod, 'http://localhost:8282/LoggingServices/opLogAccount',
                ['headers'=>$httpHeaders,'body' => $encodedHttpBody]);

            return $response;
        } else {
            // Request Async

            return $response;
        }

    }
}