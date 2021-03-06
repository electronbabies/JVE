<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    static $tUserPermissions = [
    	'Admin Panel' => [
    		'Admin/View'		=> 'View Admin Panel',
    	],
    	'Users' => [
			'Edit/Admin' 		=> "Edit Admins",
			'Edit/Client' 		=> "Edit Clients",
			'Edit/Employee' 	=> "Edit Employees",
			'View/Admin' 		=> "View Admins",
			'View/Client'		=> "View Clients",
			'View/Employee'		=> "View Employees",
			'View/Guest' 		=> "View Guest",
    	],
    	// Definitely need to make type static
		'Orders' => [
			// Only assign to works with edit
			'Edit/Service' 				=> 'Edit Service Orders',
			'Edit/Parts' 				=> 'Edit Parts Orders',
			'Edit/Rental' 				=> 'Edit Rental Orders',
			'Edit/Sales' 				=> 'Edit Sales Orders',
			'View/Service'				=> 'View Service Orders',
			'View/Parts' 				=> 'View Parts Orders',
			'View/Rental' 				=> 'View Rental Orders',
			'View/Sales' 				=> 'View Sales Orders',
		],
		'Blog' => [
			'Edit/Blog'			=> 'Edit Blog Posts',
			'View/Blog'			=> 'View Blog Posts',
		],
		'Gallery' => [
			'Edit/Gallery'		=> 'Edit Gallery Posts',
			// Might want to mark these as sold if they can, and not shown if they can't.
			'View/Sold'			=> 'View Sold Gallery Posts',
			'View/Gallery'		=> 'View Gallery',
		],
		'Documents' => [
			'Edit/Documents'	=> 'Edit Documents',
			'View/Documents'	=> 'View Documents',
		],
		'Careers' => [
			'Edit/Careers' 		=> 'Edit Careers',
			'View/Careers' 		=> 'View Careers',
		],
		/*'Vacations' => [
			// Should be all employees
			'Edit/Vacation'		=> 'Edit Vacation Requests',
			'View/Vacation'		=> 'View Vacation',
		],*/
		/*'Holidays' => [
			// Should be only admins
		],*/
		/*'Calendar' => [
			'View/Calendar'		=> 'View Calendar',
		],*/
    ];

    const ROLE_ADMIN = 'Admin';
    const ROLE_CLIENT = 'Client';
    const ROLE_EMPLOYEE = 'Employee';
    const ROLE_GUEST = 'Guest';

    // There has to be a better way to do this.
    static $tRoles = [
    	self::ROLE_ADMIN,
		self::ROLE_EMPLOYEE,
		self::ROLE_CLIENT,
	];

	/**
	 * Users allowed to be viewed by logged in user
	 * @param $query
	 * @param $objUser
	 */
	public function scopePermusers($query, $objUser)
	{
		// Something never true, otherwise it returns a full set on 0 permissions matched.
		$query->where('role', '0');

		$query->orWhere(function ($query) use ($objUser) {
			if ($objUser->HasPermission('View/Client'))
				$query->orwhere('role', static::ROLE_CLIENT);

			if ($objUser->HasPermission('View/Employee'))
				$query->orwhere('role', static::ROLE_EMPLOYEE);

			if ($objUser->HasPermission('View/Admin'))
				$query->orwhere('role', static::ROLE_ADMIN);

			if ($objUser->HasPermission('View/Guest')) {
				$query->orwhere('role', static::ROLE_GUEST);
			}
		});

		return $query;
	}

	public function scopeNewClients($query)
	{
		return $query->where('role', '=', static::ROLE_CLIENT)->where('created_at', '>', Carbon::now()->subMonth());
	}
	public function scopeClients($query)
	{
		return $query->where('role', '=', static::ROLE_CLIENT);
	}

	public function scopeEmployees($query)
	{
		return $query->where('role', '=', static::ROLE_EMPLOYEE);
	}

	public function scopeAdmins($query)
	{
		return $query->where('role', '=', static::ROLE_ADMIN);
	}

	public function scopeNonClient($query)
	{
		return $query->where('role', '!=', static::ROLE_CLIENT)->where('role', '!=', static::ROLE_GUEST);
	}

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

	/**
	 * Return global guest user account
	 * @return mixed
	 */
	static public function GetGuestAccount()
	{
		$objUser = \App\User::where('role', '=', static::ROLE_GUEST)->first();
		return $objUser;
	}

	public function IsGuestAccount()
	{
		return $this->role == static::ROLE_GUEST;
	}


    public function Invoices()
    {
        return $this->hasMany('App\Invoice');
    }

    public function permissions()
	{
		return $this->hasMany('App\Permission');
	}

	public function HasPermission($Permission, $SkipAggregate=false)
	{
		// Admins rule all muahahaha
		if($this->IsAdmin())
			return true;

		// Aggregate permissions
		if(!$SkipAggregate) {
			switch($Permission) {
				case 'View/Users':
					if ($this->HasPermission('View/Client', true) || $this->HasPermission('View/Employee', true)
						|| $this->HasPermission('View/Admin', true) || $this->HasPermission('View/Guest', true))
						return true;
					return false;
				case 'View/Orders':
					if ($this->HasPermission('View/Service', true) || $this->HasPermission('View/Rental', true)
						|| $this->HasPermission('View/Parts', true) || $this->HasPermission('View/Sales', true)
					)
						return true;
					return false;
				case 'Edit/Orders':
					if ($this->HasPermission('Edit/Service', true) || $this->HasPermission('Edit/Rental', true)
						|| $this->HasPermission('Edit/Parts', true) || $this->HasPermission('Edit/Sales', true)
					)
						return true;
					return false;
			}
		}

		foreach($this->permissions as $tPermission) {
			if($tPermission->permission == $Permission)
				return true;
		}
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
                    if($objUser->role == static::ROLE_CLIENT)
                        return false;
                    break;
                default:
                    return false;
                break;
            }
        }

        return true;
    }

	public function IsAdmin()
	{
		return $this->role == static::ROLE_ADMIN;
	}

    public function getFirstNameAttribute($value)
	{
	 	$Name = $this->IsGuestAccount() ? '' : $this->attributes['name'];
		$tNames = explode(' ', $Name);

		// In case for some reason they put multiple first names
		$LastName = count($tNames) > 1 ? array_pop($tNames) : '';
		$FirstName = implode(' ', $tNames);

		$FirstName = $this->IsGuestAccount() ? '' : $FirstName;

		return ucfirst($FirstName);
	}

	public function getLastNameAttribute($value)
	{
		$Name = $this->IsGuestAccount() ? '' : $this->attributes['name'];
		$tNames = explode(' ', $Name);
		$LastName = count($tNames) > 1 ? array_pop($tNames) : '';

		$LastName = $this->IsGuestAccount() ? '' : $LastName;

		return ucfirst($LastName);
	}

	public function getEmailAttribute($value)
	{
		return $this->IsGuestAccount() ? '' : $value;
	}

	public function getPhoneAttribute($value)
	{
		return $this->IsGuestAccount() ? '' : $value;
	}

	public function getCompanyNameAttribute($value)
	{
		return $this->IsGuestAccount() ? '' : $value;
	}

    public function Vacations()
	{
		return $this->hasMany('\App\VacationRequest')->where('type', \App\VacationRequest::TYPE_VACATION);
	}
}
