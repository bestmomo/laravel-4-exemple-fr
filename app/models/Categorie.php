<?php

class Categorie extends Eloquent {

	protected $guarded = array();

	public function section()
	{
		return $this->belongsTo('Section');
	}

	public function articles()
	{
		return $this->hasMany('Article');
	}

    public static $rules = array(
        'titre' => 'required|max:255',
        'section_id' => 'exists:sections,id'
    );

}