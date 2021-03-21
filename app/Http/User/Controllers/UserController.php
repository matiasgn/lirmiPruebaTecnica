<?php


namespace App\Http\User\Controllers;


use App\Http\Controllers\Controller;
use App\Http\User\Interfaces\UserServiceIface;

class UserController extends Controller
{
    private $service;

    public function __construct(UserServiceIface $userServiceIface)
    {
        $this->service = $userServiceIface;
    }

    public function list(Request $request)
    {
        return $this->service->list($request);
    }

    public function listAPI(Request $request)
    {
        return $this->service->list($request);
    }

}
