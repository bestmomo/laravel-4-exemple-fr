<?php

class UserController extends BaseController {

    /**
     * Dépôt
     *
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Affiche les utilisateurs
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->all();

        return View::make('backend.users.index', compact('users'));
    }

    /**
     * Affiche le formulaire pour modifier un utilisateur
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        if (is_null($user))
        {
            return Redirect::route('users.index');
        }

        return View::make('backend.users.edit', compact('user'));
    }

    /**
     * Enregistre les changements pour l'utilisateur
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, User::$rules_edit);

        if ($validation->passes())
        {
            $user = $this->user->find($id);
            $user->update($input);

            return Redirect::route('users.index');
        }

        return Redirect::route('users.edit', $id)
            ->withInput()
            ->withErrors($validation);
    }

    /**
     * Supprime l'utilisateur
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->user->find($id)->delete();

        return Redirect::route('users.index');
    }

}