<?php


namespace App\Http\UserAPI\Service;

use App\Http\UserAPI\Interfaces\UserAPIServiceIface;
use Illuminate\Support\Facades\Http;

class UserAPIService implements UserAPIServiceIface
{

    /**
     * UserAPIService constructor.
     */
    public function __construct()
    {

    }

    public function list(int $page)
    {
        $response = Http::get(env('API_ENDPOINT'), [
            'page' => $page,
        ]);
        return $response;
    }

    public function findById(int $id)
    {
        $response = Http::get(env('API_ENDPOINT'), [
            'id' => $id,
        ]);
        return $response;
    }
}
