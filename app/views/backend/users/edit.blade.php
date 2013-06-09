@extends('backend/layouts/default')

@section('content')

<div class="span12">
	<div class="well">

		<div class="page-header">
			<h3>
				Modification de l'utilisateur {{ $user->username }}
				
				<div class="pull-right">
					<a href="javascript:history.back()" class="btn btn-medium btn-info"><i class="icon-backward icon-white"></i> Annuler</a>
				</div>
			</h3>
		</div>

	    {{ Form::open(array('url' => 'users/'.$user->id, 'method' => 'put')) }}
		    <fieldset>
			    <div class="control-group {{ $errors->first('username', 'error') }}">
			    	{{ Form::label('username', 'Identifiant :', array('class' => 'control-label')) }}
				    <div class="controls">
				    	{{ Form::text('username', $user->username) }}
				    	{{ $errors->first('username', '<span class="help-block">:message</span>') }}
				    </div>
			    </div>
	            <div class="control-group {{ $errors->first('email', 'error') }}">
	                {{ Form::label('email', 'E-mail :', array('class' => 'control-label')) }}
	                <div class="controls">
	                    {{ Form::text('email', $user->email) }}
	                    {{ $errors->first('email', '<span class="help-block">:message</span>') }}
	                </div>
	            </div>
			    <div class="control-group {{ $errors->first('role_id', 'error') }}">
			    	{{ Form::label('role_id', 'Rôle :', array('class' => 'control-label')) }}
			    	<div class="controls">
				    	<select name="role_id" id="role_id" class="input-medium">
							<option value="1"{{ $user->role_id == 1 ? ' selected' : '' }}>Utilisateur</option>
							<option value="2"{{ $user->role_id == 2 ? ' selected' : '' }}>Rédacteur</option>
							<option value="3"{{ $user->role_id == 3 ? ' selected' : '' }}>Administrateur</option>
						</select>
				    </div>
			    </div>
			    <div class="control-group">
				    <div class="controls">
				    	{{ Form::submit('Valider', array('class' => 'btn btn-success')) }}
				    </div>
			    </div>
		    </fieldset>
	    {{ Form::close() }}
	</div>
</div>
@stop