<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Fillable attributes - prevent mass-assignment	
	 *
	 * @var array
	 */
	protected $fillable = array('id', 'role_id');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Role - One to one
	 *
	 * @return
	 */
	public function role()
	{
		return $this->belongsTo('Role');
	}

	/**
	 * Runs
	 *
	 * @return
	 */
	public function runs()
	{
		return $this->hasMany('Run');
	}

	// /**
	//  * OAuth Client IDs
	//  *
	//  * @return
	//  */
	// public function oauthClients()
	// {
	// 	$clients = DB::table('user_oauth_clients')->where('user_id', $this->id)->lists('oauth_client_id');
	// 	return $clients;
	// }

	/**
	 * Logins
	 *
	 * @return
	 */
	public function logins()
	{
		return $this->hasMany('Login');
	}

}