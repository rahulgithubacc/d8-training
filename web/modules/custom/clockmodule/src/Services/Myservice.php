<?php
namespace Drupal\clockmodule\Services;
class MyService{
    public function myservice()
    {
			$client=new \GuzzleHttp\Client();
			$response=$client->request('GET', 'http://worldclockapi.com/api/json/est/now?q='.'&timeZoneName=Eastern Standard Time');
			// print_r($response);
			return $response->getBody();
    }
}    