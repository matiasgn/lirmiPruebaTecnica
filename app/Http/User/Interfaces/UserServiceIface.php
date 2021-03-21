<?php


namespace App\Http\User\Interfaces;


interface UserServiceIface
{
    public function list();

    public function store(array $payload);

    public function delete(int $id);

}
