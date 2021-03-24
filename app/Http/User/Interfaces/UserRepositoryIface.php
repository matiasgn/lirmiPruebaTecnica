<?php


namespace App\Http\User\Interfaces;


interface UserRepositoryIface
{
    public function store(string $name,string $surname ,string $email);

    public function list();

    public function delete(int $id);
}
