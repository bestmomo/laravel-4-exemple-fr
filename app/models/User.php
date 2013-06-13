<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	protected $guarded = array();

	protected $table = 'users';

	protected $hidden = array('password');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function articles()
	{
		return $this->hasMany('Article');
	}

	public function role()
	{
		return $this->belongsTo('Role');
	}

	public static function admin() {
		return Auth::check() ? Auth::user()->role_id == 3 : false;
	}

	public static function redactor() {
		return Auth::check() ? Auth::user()->role_id == 2 : false;
	}

    public static $rules = array(
        'username' => 'required|alpha|between:6,64|unique:users,username',
        'email' => 'required|email|unique:users|confirmed',
        'password' => 'required|alpha_num|between:6,20|confirmed'
    );

    public static $rules_edit = array(
        'username' => 'required|alpha|between:6,64',
        'email' => 'required|email',
    );

    public static $rules_login = array(
        'username' => 'required|alpha|between:6,64',
        'password' => 'required|alpha_num|between:6,20',
    );

    public static $rules_forget = array(
        'email' => 'required|email|exists:users,email'
    );

    public static $rules_reset = array(
		'email' => 'required|email|exists:users,email',
		'password' => 'required|alpha_num|between:6,20|confirmed'
    );

    public static $messages = array(
        'username.required' => 'Nous avons besoin de votre pseudo.',
        'username.alpha' => 'Le pseudo doit être composé de caractères alphabétiques.',
        'username.between' => 'Le nombre de caractères du pseudo doit être compris entre :min et :max.',
        'username.unique' => 'Ce pseudo est déjà utilisé.',
        'password.required' => 'Nous avons besoin d\'un mot de passe.',
        'password.alpha_num' => 'Le mot de passe doit être composé de caractères alphanumériques.',
        'password.between' => 'Le nombre de caractères du mot de passe doit être compris entre :min et :max.',
        'password.confirmed' => 'La confirmation du mot de passe n\'est pas correcte.'
    );
    
}