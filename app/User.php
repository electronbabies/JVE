<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    const ROLE_ADMIN = 'Admin';
    const ROLE_CLIENT = 'Client';
    const ROLE_EMPLOYEE = 'Employee';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function Invoices()
    {
        return $this->hasMany('App\Invoice');
    }
    /**
     * Return global guest user account
     * @return mixed
     */
    static public function GetGuestAccount()
    {
        $objUser = \App\User::where('name', '=', 'Guest')->first();
        return $objUser;
    }
    /*
     * $Permissions string Slash (/) separated permission list
     */
    public function HasPermissions($Permissions) {
        // I cannot believe laravel does not support db sets hence this shitty function.
        $objUser = \Auth::User();
        if(!$objUser)
            return false;

        $tPermissions = explode('/', $Permissions);

        foreach($tPermissions as $Permission) {
            switch($Permission) {
                case 'Admin Panel':
                    if($objUser->role == 'Client')
                        return false;
                    break;
                default:
                    return false;
                break;
            }
        }

        return true;
    }
    public function IsAdmin() {
        return $this->role == static::ROLE_ADMIN;
    }

    public function Vacations()
	{
		return $this->hasMany('\App\VacationRequest');
	}
}
