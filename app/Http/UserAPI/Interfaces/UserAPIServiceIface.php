<?php


namespace App\Http\UserAPI\Interfaces;


interface UserAPIServiceIface
{
    // API
    public function list(int $page);

    public function findById(int $id);
}
