@extends('frontend/layouts/default')

@section('content')
<div class="span12">
    <h3>Pour créer un nouveau mot de passe veuillez remplir ce formulaire :</h3>
    <div class="well">
	    {{ Form::open(array('url' => 'auth/reset/'.$token, 'method' => 'POST', 'class' => 'form-horizontal')) }}
	    	<fieldset>
	    		{{ Form::hidden('token', $token)}}
	            <div class="control-group {{ $errors->first('email', 'error')">
	                {{ Form::label('email', 'Email :', array('class' => 'control-label')) }}
	                <div class="controls">
	                    {{ Form::email('email') }}
	                    {{ $errors->first('email', '<span class="help-block">:message</span>') }}
	                </div>
	            </div>
	            <div class="control-group {{ $errors->first('password', 'error')">
	                {{ Form::label('password', 'Mot de passe :', array('class' => 'control-label')) }}
	                <div class="controls">
	                    {{ Form::password('password') }}
	                    {{ $errors->first('password', '<span class="help-block">:message</span>') }}
	                </div>
	            </div>
	            <div class="control-group">
	                {{ Form::label('password_confirmation', 'Confirmation passe :', array('class' => 'control-label')) }}
	                <div class="controls">
	                    {{ Form::password('password_confirmation') }}
	                </div>
	            </div>
			    <div class="control-group">
				    <div class="controls">
				    	{{ Form::submit('Envoyer', array('class' => 'btn')) }}
				    </div>
			    </div>			
			</fieldset>
	    {{ Form::close() }}
    </div>
</div>
@stop