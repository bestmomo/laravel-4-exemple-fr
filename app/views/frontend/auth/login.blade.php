@extends('frontend/layouts/default')

@section('content')
	<div class="span12">
	    <h3>Vous avez un compte ?</h3>
	    <div class="well">
		    <ul class="nav nav-tabs">
			    <li {{ Request::is('auth/login') ? 'class="active"' : '' }}><a href="#login" data-toggle="tab">Connexion</a></li>
			    <li {{ Request::is('auth/login/forget') ? 'class="active"' : '' }}><a href="#forget" data-toggle="tab">Mot de passe oublié</a></li>
			    <li {{ Request::is('auth/login/create') ? 'class="active"' : '' }}><a href="#create" data-toggle="tab">Créer un compte</a></li>
		    </ul>
		    <div class="tab-content">
			    <div class="tab-pane {{ Request::is('auth/login') ? 'active in' : 'fade' }}" id="login">
			    	{{ Form::open(array('url' => 'auth/login', 'method' => 'POST', 'class' => 'form-horizontal')) }}
					    <fieldset>
						    <div class="control-group {{ Request::is('auth/login') ? $errors->first('username', 'error') : '' }}">
						    	{{ Form::label('username', 'Pseudo :', array('class' => 'control-label')) }}
							    <div class="controls">
							    	{{ Form::text('username') }}
							    	{{ Request::is('auth/login') ? $errors->first('username', '<span class="help-block">:message</span>') : '' }}
							    </div>
						    </div>
				            <div class="control-group {{ Request::is('auth/login') ? $errors->first('password', 'error') : '' }}">
				                {{ Form::label('password', 'Mot de passe :', array('class' => 'control-label')) }}
				                <div class="controls">
				                    {{ Form::password('password') }}
				                    {{ Request::is('auth/login') ? $errors->first('password', '<span class="help-block">:message</span>') : '' }}
				                </div>
				            </div>
				            <div class="control-group">
				            	<div class="controls">
					            	<label class="checkbox">
					            		Se rappeler de moi
										{{ Form::checkbox('remember', '1'); }}
									</label>
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
			    <div class="tab-pane {{ Request::is('auth/login/forget') ? 'active in' : 'fade' }}" id="forget">
				    {{ Form::open(array('url' => 'auth/forget', 'method' => 'POST', 'class' => 'form-horizontal')) }}
				    	<fieldset>
				    		<p>Si vous ayez oublié votre mot de passe. Ne vous affolez pas, nous allons vous donner la possibilité d'en créer un nouveau. Veuillez entrer dans ce formulaire l'adresse email que vous avez utilisée pour votre inscription :</p>
				    		<hr>
            	            <div class="control-group {{ Request::is('auth/login/forget') ? $errors->first('email', 'error') : '' }}">
				                {{ Form::label('email', 'Email :', array('class' => 'control-label')) }}
				                <div class="controls">
				                    {{ Form::email('email') }}
				                    {{ Request::is('auth/login/forget') ? $errors->first('email', '<span class="help-block">:message</span>') : '' }}
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
			    <div class="tab-pane {{ Request::is('auth/login/create') ? 'active in' : 'fade' }}" id="create">
				    {{ Form::open(array('url' => 'auth/inscription', 'method' => 'POST', 'class' => 'form-horizontal')) }}
				    	<fieldset>
				            <div class="control-group {{ Request::is('auth/login/create') ? $errors->first('username', 'error') : '' }}">
				                {{ Form::label('username', 'Pseudo :', array('class' => 'control-label')) }}
				                <div class="controls">
				                    {{ Form::text('username') }}
				                    {{ Request::is('auth/login/create') ? $errors->first('username', '<span class="help-block">:message</span>') : '' }}
				                </div>
				            </div>
				            <div class="control-group {{ Request::is('auth/login/create') ? $errors->first('email', 'error') : '' }}">
				                {{ Form::label('email', 'Email :', array('class' => 'control-label')) }}
				                <div class="controls">
				                    {{ Form::email('email') }}
				                    {{ Request::is('auth/login/create') ? $errors->first('email', '<span class="help-block">:message</span>') : '' }}
				                </div>
				            </div>
				            <div class="control-group">
				                {{ Form::label('email_confirmation', 'Confirmation Email :', array('class' => 'control-label')) }}
				                <div class="controls">
				                    {{ Form::email('email_confirmation') }}
				                </div>
				            </div>
				            <div class="control-group {{ Request::is('auth/login/create') ? $errors->first('password', 'error') : '' }}">
				                {{ Form::label('password', 'Mot de passe :', array('class' => 'control-label')) }}
				                <div class="controls">
				                    {{ Form::password('password') }}
				                    {{ Request::is('auth/login/create') ? $errors->first('password', '<span class="help-block">:message</span>') : '' }}
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
	    </div>
    </div>
@stop