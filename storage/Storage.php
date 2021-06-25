<?php


namespace app\storage;


interface Storage
{
    public function insert($data, $options = []);

    public function remove($condition = [], $options = []);

    public function find($condition = [], $options = []);

    public function count($condition = [], $options = []);

}