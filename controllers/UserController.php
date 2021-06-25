<?php

namespace app\controllers;

use app\services\BitcoinService;
use app\services\StorageService;
use yii\web\Controller;

class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    private $storageService;


    public function __construct($id, $module,  $config = [], StorageService $storageService)
    {
        $this->storageService = $storageService;
        parent::__construct($id, $module, $config);
    }

    public function beforeAction($action)
    {
        if ($action->id == 'create') {
            $this->enableCsrfValidation = false;
        }
        if ($action->id == 'login') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }




    public function actionCreate($email, $password)
    {
        return $this->storageService->createUser($email,$password);
    }

    public function actionLogin($email, $password)
    {
        return $this->storageService->loginUser($email, $password);
    }


}
