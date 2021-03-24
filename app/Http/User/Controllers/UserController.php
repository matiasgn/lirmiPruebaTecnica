<?php


namespace App\Http\User\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
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
        $request->validate([
            'page' => 'required|integer'
        ]);

        return $this->service->listAPI($request->page);
    }

    public function findAPI(Request $request)
    {

        $request->validate([
            'id' => 'required|integer|between:1,14'
        ]);

        return $this->service->findAPI($request->id);
    }

    public function store(Request $request)
    {
        $request->validate([
              'name' => 'required|string|max:60'
             ,'surname' => 'required|string|max:60'
             ,'email' => 'required|string|max:60'

        ]);

        return $this->service->store($request->input());
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        return $this->service->delete($request->id);
    }


}
