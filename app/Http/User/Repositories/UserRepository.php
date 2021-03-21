<?php


namespace App\Http\User\Repositories;

use App\Http\User\Interfaces\UserRepositoryIface;
use App\Http\User\Entity\UserEntity;

class UserRepository implements UserRepositoryIface
{
    private $entity;

    public function __construct(UserEntity $user)
    {
        $this->entity = $user;
    }

    public function store(string $name, string $surname, string $email)
    {
        return $this->entity::create([
              'name'     => $name
            , 'surname'  => $surname
            , 'email'    => $email
        ]);
    }

    public function list()
    {
         return $this->entity::get();
    }


    public function delete(int $id)
    {
        $user=User::find($id);
        return $user->delete();
    }



}
