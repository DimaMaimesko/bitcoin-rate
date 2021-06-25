<?php
namespace app\services;
use yii\httpclient\Client;

class ApiService
{

  public function getBitcoinRate()
  {
    $params  =[
    ];
    $url = 'https://blockchain.info/ru/ticker';
    try {
      $client = new Client();
      $response = $client->createRequest()
        ->addHeaders(['Accept' => 'application/json'])
        ->setMethod('GET')
        ->setUrl($url)
        ->setData($params)
        ->send();

       if ($response->isOk && $response->data != []) {
            return $response->data;
        } else {
            return false;
        }
    } catch (\BadMethodCallException $e) {
      return 'api error';
    }
  }


}
