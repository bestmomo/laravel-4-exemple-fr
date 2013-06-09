@extends('backend/layouts/default')

@section('content')

<div class="span12">
	<div class="well">

		<div class="page-header">
			<h3>
				Création d'une categorie
				
				<div class="pull-right">
					<a href="javascript:history.back()" class="btn btn-medium btn-info"><i class="icon-backward icon-white"></i> Annuler</a>
				</div>
			</h3>
		</div>

	    {{ Form::open(array('url' => 'categories')) }}
		    <fieldset>
		    	<div class="control-group">
			    	{{ Form::label('sections', 'Section :', array('class' => 'control-label')) }}
					<select name="section_id" id="section_id" class="input-medium">
						@foreach($sections as $section)
							<option value="{{ $section->id }}">
								{{ $section->titre }}
							</option>
						@endforeach
					</select>
				</div>
			    <div class="control-group {{ $errors->first('titre', 'error') }}">
			    	{{ Form::label('titre', 'Titre :', array('class' => 'control-label')) }}
				    <div class="controls">
				    	{{ Form::text('titre') }}
				    	{{ $errors->first('titre', '<span class="help-block">:message</span>') }}
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