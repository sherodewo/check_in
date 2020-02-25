<?php


namespace App\Http\Client;

use GuzzleHttp\Client;

class ProvinceClient
{
   public function getProvince(){
       $client = new Client();
       $request = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi');
       $response = $request;
       return json_decode($response->getBody()->getContents());
   }

}
