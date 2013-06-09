<?php

class Section extends Eloquent {

	protected $guarded = array();

	public function categories()
	{
		return $this->hasMany('Categorie');
	}

    public static $rules_create = array(
        'titre' => 'required|max:255|unique:sections',
        'description' => 'required'
    );

    public static $rules_edit = array(
        'titre' => 'required|max:255',
        'description' => 'required'
    );

}