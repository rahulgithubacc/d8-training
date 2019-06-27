<?php
namespace Drupal\weather\Services;
class MyService{
    public function myservice()
    {
			$client=new \GuzzleHttp\Client();
			$response=$client->request('http://worldclockapi.com/api/json/est/now');
			return $response->getBody();
    }
}    