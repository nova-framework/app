<?php
/**
 * Users - A Users Model.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */

namespace App\Models;

use Nova\Auth\UserTrait;
use Nova\Auth\UserInterface;
use Nova\Auth\Reminders\RemindableTrait;
use Nova\Auth\Reminders\RemindableInterface;
use Nova\Database\ORM\Model as BaseModel;


class User extends BaseModel implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    //
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = array('username', 'password', 'realname', 'email', 'active', 'activation_code');

    protected $hidden = array('password', 'activation_code', 'remember_token');

}
