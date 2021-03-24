<?php


namespace App\Http\User\Interfaces;


interface UserServiceIface
{
    public function list();

    public function store(array $payload);

    public function delete(int $id);

    public function listAPI(int $page);

    public function findAPI(int $id);

}
