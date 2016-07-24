<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class GruzzleController extends Controller
{

    public function saveApiData()
    {
        $headers = [
            'Content-Type'     => 'application/json',
        ];

        $body = [
            'opSendContactRq' => [
                'serviceName' => 'AccountServices',
                'operationName' => 'opRegister',
                'contactType' => 'EMAIL',
                'contactName' => 'SUCCESS_REG',
                'contactReceiver' => 'pradhanywidityan@gmail.com'
            ]
        ];

        $encodedBody = json_encode($body);

        $client = new Client();
        $res = $client->request('POST', 'http://localhost:8383/ContactServices/opSendContact',
            ['headers'=>$headers,'body' => $encodedBody]);
//
//
//        echo $res->getStatusCode();
//        // "200"
//        echo $res->getHeader('content-type');
//        // 'application/json; charset=utf8'
//        echo $res->getBody();
//        // {"type":"User"...'
    }
}
