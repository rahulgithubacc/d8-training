<?php
namespace Drupal\clockmodule\Services;
class MyService{
    public function myservice()
    {
			$client=new \GuzzleHttp\Client();
			$response=$client->request('http://worldclockapi.com/api/json/est/now');
			// print_r($response);
			return $response->getBody();
    }
}    