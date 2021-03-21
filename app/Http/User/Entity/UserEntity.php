<?php


namespace App\Http\User\Entity;


class UserEntity extends \Illuminate\Database\Eloquent\Model
{

    protected $table = 'users';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
         'name'
        ,'surname'
        ,'email'
    ];

}
