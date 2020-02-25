<?php


namespace App\Http\Client;

use GuzzleHttp\Client;

class CityClient
{
   public function getCity(){
       $client = new Client();
       $request = $client->get('http://dev.farizdotid.com/api/daerahindonesia/provinsi/32/kabupaten');
       $response = $request;
       return json_decode($response->getBody()->getContents());
   }

}
