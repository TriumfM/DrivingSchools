<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserToken
 * @params int $id
 * @params int $user_id
 * @params dateTime $expire
 * @package App\Entities
 */
class UserToken extends Model
{
    protected $table = 'usr_token';

    public $timestamps = false;

}