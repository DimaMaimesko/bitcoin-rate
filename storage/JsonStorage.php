<?php


namespace app\storage;
use Yii;

class JsonStorage implements Storage
{

    public function test($data, $options = [])
    {
       $jsonString =  $this->getStorage();
       $jsonArr = json_decode($jsonString, true); // decode the JSON into an associative array
       $jsonArr['ddd'] = [
           'username' => "no",
           'password' => $data['password'],
           ];
       $jsonString = json_encode($jsonArr);
       $this->saveStorage($jsonString);
       return $this->getStorage();

    }

    public function insert($data = [], $options = [])
    {
        $jsonString =  $this->getStorage();
        $jsonArr = json_decode($jsonString, true);

        $jsonArr[$data['email']] = [
            'password_hash' => Yii::$app->security->generatePasswordHash($data['password']),
            'status' => isset($options['status']) ? $options['status'] : 'new'
        ];
        $jsonString = json_encode($jsonArr);
        return $this->saveStorage($jsonString);

    }

    public function remove($condition = [], $options = [])
    {
        if ($this->find($condition)) {
            $jsonString =  $this->getStorage();
            $jsonArr = json_decode($jsonString, true);
            unset( $jsonArr[$condition['email']]);
            $jsonString = json_encode($jsonArr);
            $this->saveStorage($jsonString);
        }
    }

    public function find($condition = [], $options = [])
    {
        $jsonString =  $this->getStorage();
        $jsonArr = json_decode($jsonString, true);
        foreach ($jsonArr as $email => $data) {
            if ($email === $condition['email']) {
                return $data;
            }
        }
        return false;
    }

    public function count($condition = [], $options = [])
    {

    }

    private function getStorage()
    {
        return file_get_contents('users.json');
    }

    private function saveStorage($data)
    {
        return file_put_contents('users.json', $data);
    }

}