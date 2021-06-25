<?php

namespace app\services;

use app\storage\JsonStorage;

class StorageService
{
    private $jsonStorage;


    public function __construct(JsonStorage $jsonStorage)
    {
        $this->jsonStorage = $jsonStorage;

    }

    public function createUser($email, $password)
    {

        $this->jsonStorage->insert(['email' => $email, 'password' => $password]);
        if ($this->jsonStorage->find(['email' => $email])) {
            return json_encode([
                'result' => false,
                'message' => "User with this email already exists",
                ]);
        } else {
            $this->jsonStorage->insert(['email' => $email, 'password' => $password]);
            return json_encode([
                'result' => true,
                'message' => "User created successfully",
            ]);
        }
    }

    public function loginUser($email, $password)
    {
        $user = $this->jsonStorage->find(['email' => $email]);
        if ($user && \Yii::$app->getSecurity()->validatePassword($password, $user['password_hash'])) {
            $this->jsonStorage->insert(['email' => $email, 'password' => $password], ['status' => 'verified']);
            return json_encode([
                'result' => true,
                'message' => "User logged in",
                ]);
        } else {
            return json_encode([
                'result' => false,
                'message' => "Wrong Password",
            ]);
        }


    }




}