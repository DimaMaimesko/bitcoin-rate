<?php

namespace app\services;

use app\storage\JsonStorage;

class BitcoinService
{
    private $jsonStorage;
    private $apiService;


    public function __construct(JsonStorage $jsonStorage, ApiService $apiService)
    {
        $this->jsonStorage = $jsonStorage;
        $this->apiService = $apiService;

    }

    public function getRate()
    {
        return json_encode($this->apiService->getBitcoinRate());


    }





}