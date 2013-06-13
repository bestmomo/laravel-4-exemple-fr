<?php

class Section extends BaseModel {

	protected $guarded = array();

	public function categories()
	{
		return $this->hasMany('Categorie');
	}

    protected static $rules = array(
        'titre' => 'required|max:255|unique:sections,titre',
        'description' => 'required'
    );

}