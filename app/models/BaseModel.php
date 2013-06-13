<?php

class BaseModel extends Eloquent {

	public $errors;

	public static $rules_s;

	public static function boot()
	{
		parent::boot();
		
		static::creating(function($model)
		{
			if (!isset(static::$rules_s)) static::$rules_s = $model::$rules;
			return $model->validate(static::$rules_s, $model);
		});

		static::updating(function($model)
		{ 
			if (!isset(static::$rules_s)) 
			{
				static::$rules_s = $model::$rules;
				foreach (static::$rules_s as &$rule) {
					$rule = preg_replace('#\|unique:(\w+,\w+)#', '|unique:$1,' . $model['id'], $rule);
				}
			}
			return $model->validate(static::$rules_s, $model);
		});
	}

	private function validate($rules, $model)
	{			
		if (property_exists(get_class($model), 'messages')) $messages = $model::$messages;
		else $messages = [];

		$validation = Validator::make(Input::all(), $rules, $messages);

		if($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}

}