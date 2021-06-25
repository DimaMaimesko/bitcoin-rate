<?php

namespace app\controllers;

use app\services\BitcoinService;
use app\services\StorageService;
use yii\web\Controller;

class BitcoinController extends Controller
{
    /**
     * {@inheritdoc}
     */
    private $storageService;
    private $bitcoinService;


    public function __construct($id, $module,  $config = [], StorageService $storageService, BitcoinService $bitcoinService)
    {
        $this->storageService = $storageService;
        $this->bitcoinService = $bitcoinService;
        parent::__construct($id, $module, $config);
    }



    public function actionGetRate($email, $password)
    {
        if ($this->storageService->validateUser($email, $password)) {
            return json_encode([
                'result' => false,
                'message' => "Success",
                'data' => $this->bitcoinService->getRate(),
            ]);
        }
        return json_encode([
            'result' => false,
            'message' => "Unauthorised request",
        ]);

    }



}
