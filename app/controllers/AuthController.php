<?php

class AuthController extends BaseController {

	public function __construct()
	{
		// Filtres
		$this->beforeFilter('guest', array('only' => array('getLogin')));
		$this->beforeFilter('auth', array('only' => array('getLogout')));
	}

	/**
	 * Affichage des formulaires
	 *
	 * @return View
	 */
	public function getLogin($action = 'login')
	{
		// Création de la vue de login
		return View::make('frontend.auth.login', array('sections' => Section::all(), 'action' => $action));
	}

	/**
	 * Traitement du formulaire de connexion
	 *
	 * @return Redirect
	 */
	public function postLogin()
	{
		// Validation
		$v = Validator::make(Input::all(), User::$rules_login, User::$messages);

		// Si échec de la validation
		if ($v->fails())
		{
			return Redirect::to('auth/login')->withErrors($v)->withInput(Input::except('password'));
		}

		// Tentative d'authentification
        if (Auth::attempt(Input::only('username', 'password'), Input::get('remember', 0))) {
            return Redirect::home()
                ->with('flash_success', 'Vous avez été correctement connecté avec le pseudo ' . Auth::user()->username);
        }
        return Redirect::to('auth/login')->with('flash_error', 'Pseudo ou mot de passe non correct !')->withInput(Input::except('password'));	
	}

	/**
	 * Deconnexion
	 *
	 * @return View
	 */
	public function getLogout()
	{
		Auth::logout(); 

		return Redirect::home()
                ->with('flash_notice', 'Vous avez été correctement déconnecté.');
	}

	/**
	 * Traitement du formulaire d'inscription
	 *
	 * @return Redirect
	 */
	public function postInscription()
	{
		$user = new User;
        $user->username = Input::get('username');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));

        if($user->save())
        {
            return Redirect::home()->with('flash_success', 'Votre compte a été créé.');
        }

        return Redirect::to('auth/login/create')
        		->withErrors($user->errors)
        		->withInput(Input::only('username', 'email', 'email_confirmation'));
	}

	/**
	 * Traitement du formulaire de demande de changement de mot de passe
	 *
	 * @return Redirect
	 */
	public function postForget()
	{
		// Validation
		$v = Validator::make(Input::all(), User::$rules_forget); 

		// Si échec de la validation
		if ($v->fails())
		{
			return Redirect::to('auth/login/forget')->withErrors($v);
		}

		// Envoi de l'email
        Password::remind(array('email' => Input::get('email')), function($m) {
            $m->subject('Votre nouveau mot de passe');
        });

 		return Redirect::to('auth/login')
			->with('flash_notice', 'Un email vous a été envoyé, veuillez suivre ses indications pour renouveler votre mot de passe.');            
	}

	/**
	 * Affichage du formulaire de saisie de nouveau mot de passe
	 *
	 * @var $token
	 * @return View
	 */
	public function getReset($token)
	{
	    return View::make('frontend.auth.reset', array(
	        'sections' => Section::all(),
	        'token' => $token
	    )); 
	}

	/**
	 * Traitement du formulaire de saisie de nouveau mot de passe
	 *
	 * @var $token
	 * @return Redirect
	 */
	public function postReset($token)
	{
		// Validation
    	$v = Validator::make(Input::all(), User::$rules_reset);

		// Si échec de la validation
		if ($v->fails())
		{
			return Redirect::back()->withInput()->withErrors($v);
		}

		// Vérification email et enregistrement du nouveau mot de passe
	    $credentials = array('email' => Input::get('email'));
	    return Password::reset($credentials, function ($user, $password) {
	        $user->password = Hash::make($password);
	        $user->save();
	        return Redirect::to('auth/login')
	                ->with('flash_notice', 'Votre nouveau mot de passe à bien été enregistré. Vous pouvez maintenant vous connecter.');
	    })->withInput(); 
	}

}
