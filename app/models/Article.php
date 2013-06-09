<?php

class Article extends Eloquent {

	protected $guarded = array();

	public function categorie()
	{
		return $this->belongsTo('Categorie');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}   

	public static $rules = array(
		'titre' => 'required|max:255',
		'categorie_id' => 'exists:categories,id',
		'user_id' => 'exists:users,id',
		'intro' => 'required',
		'state' => 'in:0,1'
	);
}