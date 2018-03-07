<?php
/**
 * Users - An Users Model.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Models;

use Nova\Auth\UserTrait;
use Nova\Auth\UserInterface;
use Nova\Database\ORM\Model as BaseModel;
use Nova\Foundation\Auth\Access\AuthorizableTrait;


class User extends BaseModel implements UserInterface
{
    use UserTrait, AuthorizableTrait;

    //
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = array('username', 'password', 'realname', 'email', 'activation_code');

    protected $hidden = array('password', 'remember_token');

}
