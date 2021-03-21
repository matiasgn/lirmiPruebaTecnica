<?php


namespace App\Http\User\Service;
use App\Http\User\Interfaces\UserRepositoryIface;
use App\Http\User\Interfaces\UserServiceIface;
use App\Http\UserAPI\Interfaces\UserAPIServiceIface;

class UserService implements UserServiceIface
{

    private $repository;
    private $serviceUserAPI;

    /**
     * UserService constructor.
     */
    public function __construct(UserRepositoryIface $userRepositoryIface,
                                UserAPIServiceIface $userAPIServiceIface)
    {
        $this->repository = $userRepositoryIface;
        $this->serviceUserAPI = $userAPIServiceIface;
    }

    public function list()
    {
        return $this->repository->list();
    }

    public function store(array $payload)
    {
        return  $this->repository->store($payload['name'],$payload['surname'],$payload['email']);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function listAPI(int $page)
    {
       return $this->serviceUserAPI->listAPI($page);
    }

    public function findAPI(int $id)
    {
       return $this->serviceUserAPI->findById($id);
    }
}
