@extends('frontend/layouts/default')

@section('content')
<div class="span12">
    <h3>Pour nous laisser un message veuillez remplir ce formulaire :</h3>
    <div class="well">
	    {{ Form::open(array('url' => 'pages/contact')) }}
	    	<div class="control-group {{ $errors->first('email', 'error') }}">
	    		<div class="controls">
			    	<input id="email" name="email" type="email" class="span5" placeholder="Votre adresse Email">
			    	{{ $errors->first('email', '<span class="help-block">:message</span>') }}
			    </div>
		    </div>
		    <div class="control-group">
		    	<div class="controls">
			    	<select id"sujet" name="sujet" class="span5">
						<option>Pas de sujet particulier</option>
						<option>Erreur sur le site</option>
						<option>Proposition</option>
						<option>Demande de renseignement</option>
					</select>
				</div>
			</div>
			<div class="control-group {{ $errors->first('content', 'error') }}">
				<div class="controls">
					<textarea id="content" name="content" class="span10" placeholder="Votre message" rows="5"></textarea>
					{{ $errors->first('content', '<span class="help-block">:message</span>') }}
				</div>
			</div>
			<div class="controls">
				{{ Form::submit('Envoyer', array('class' => 'btn')) }}
			</div>
	    {{ Form::close() }}
	</div>
</div>
@stop