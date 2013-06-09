<?php

class PageController extends BaseController {

    /**
     * Affiche la page d'accueil
     *
     * @param  int  $id
     * @return Response
     */
    public function getIndex()
    {
        return View::make('frontend.pages.accueil')->with('sections', Section::all());
    }

    /**
     * Affiche la page d'informations
     *
     * @return Response
     */
    public function getAbout()
    {
        return View::make('frontend.pages.about')->with('sections', Section::all());
    }

    /**
     * Affiche le formulaire de contact
     *
     * @return Response
     */
    public function getContact()
    {
        return View::make('frontend.pages.contact')->with('sections', Section::all());
    }

    /**
     * Envoi l'email à l'administrateur avec les données de contact
     *
     * @return Response
     */
    public function postContact()
    {
        // Règles de validation
        $rules = array(
            'email' => 'required|email',
            'content' => 'required'
        );

        // Validation
        $v = Validator::make(Input::all(), $rules);  

        // Si échec de la validation
        if ($v->fails())
        {
            return Redirect::back()->withErrors($v)->withInput();
        } 

        // Mise en queue de l'email à l'administrateur
        Mail::queue('emails.pages.contact', Input::all(), function($m)
        {
            $m->to(Config::get('mail.from')['address'], 'Contact site')->subject('Contact sur le site');
        });

        return Redirect::home()->with('flash_notice', 'Merci. Votre message sera rapidement envoyé à l\'administrateur du site.');
    }

}