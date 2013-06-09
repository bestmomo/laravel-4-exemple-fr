
@section('content')

{{ HTML::script('ckeditor/ckeditor.js') }}

<div class="span12">
	<div class="well">

		<div class="page-header">
			<h3>
				Modification de l'article {{ $article->titre }}
				
				<div class="pull-right">
					<a href="javascript:history.back()" class="btn btn-medium btn-info"><i class="icon-backward icon-white"></i> Annuler</a>
				</div>
			</h3>
			<h4><i>{{ $section_titre . ' -> ' . $categorie_titre }}</i></h4>
		</div>

	    {{ Form::open(array('url' => 'articles/'.$article->id, 'method' => 'put')) }}
		    <fieldset>
		    	{{  Form::hidden('user_id', Auth::user()->id) }}
			    <div class="control-group {{ $errors->first('titre', 'error') }}">
			    	{{ Form::label('titre', 'Titre :', array('class' => 'control-label')) }}
				    <div class="controls">
				    	{{ Form::text('titre', $article->titre) }}
				    	{{ $errors->first('titre', '<span class="help-block">:message</span>') }}
				    </div>
			    </div>
			    <div class="control-group {{ $errors->first('state', 'error') }}">
			    	{{ Form::label('state', 'Statut :', array('class' => 'control-label')) }}
			    	<div class="controls">
				    	<select name="state" id="state" class="input-medium">
							<option value="0"{{ $article->state == 0 ? ' selected' : '' }}>Non publié</option>
							<option value="1"{{ $article->state == 1 ? ' selected' : '' }}>Publié</option>
						</select>
				    </div>
			    </div>
	            <div class="control-group {{ $errors->first('intro', 'error') }}">
	                {{ Form::label('intro', 'Introduction :', array('class' => 'control-label')) }}
	                <div class="controls">
	                    {{ Form::textarea('intro', $article->intro) }}
	                    {{ $errors->first('intro', '<span class="help-block">:message</span>') }}
	                </div>
	            </div>
	            <div class="control-group {{ $errors->first('texte', 'error') }}">
	                {{ Form::label('texte', 'Contenu :', array('class' => 'control-label')) }}
	                <div class="controls">
	                    {{ Form::textarea('texte', $article->texte) }}
	                    {{ $errors->first('texte', '<span class="help-block">:message</span>') }}
	                </div>
	            </div>
			    <div class="control-group">
				    <div class="controls">
				    	{{ Form::submit('Valider', array('class' => 'btn btn-success')) }}
				    </div>
			    </div>
		    </fieldset>
	    {{ Form::close() }}
	    <script>
		    window.onload = function() { 
		    	CKEDITOR.replace('intro', {
				    "filebrowserBrowseUrl" : "{{ url('filemanager/show') }}"
				}); 
		    	CKEDITOR.replace('texte', {
				    height : '500px',
				    "filebrowserBrowseUrl" : "{{ url('filemanager/show') }}"
				}); 
		    };
		</script>
	</div>
</div>
@stop