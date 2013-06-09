
@section('content')

<div class="span10 offset1">
	<div class="well">

		<div class="page-header">
			<h3>
				Gestion des articles

				<div class="pull-right">
					<a href="{{ url('articles/create/'.$categorie_id) }}" class="btn btn-medium btn-info"><i class="icon-plus-sign icon-white"></i> Créer un article dans cette catégorie</a>
				</div>
			</h3>
			<hr>
			{{ Form::open(array(
				'url' => url('articles/show-sec'),
				'id' => 'form_sections',
				'onchange' => 'document.getElementById("form_sections").submit()'
			)) }}
				{{ Form::label('sections', 'Section :', array('class' => 'control-label')) }}
				<select name="sections" id="sections" class="input-medium">
					@foreach($sections as $section)
						<option value="{{ $section->id }}"{{ $section->id == $section_id ? ' selected' : '' }}>
							{{ $section->titre }}
						</option>
					@endforeach
				</select>
			{{ Form::close() }}
			{{ Form::open(array(
				'url' => url('articles/show-cat'),
				'id' => 'form_categories',
				'onchange' => 'document.getElementById("form_categories").submit()'
			)) }}
				{{ Form::label('categories', 'Catégorie :', array('class' => 'control-label')) }}
				<select name="categories" id="categories" class="input-medium">
					@foreach($categories as $categorie)
						<option value="{{ $categorie->id }}"{{ $categorie->id == $categorie_id ? ' selected' : '' }}>
							{{ $categorie->titre }}
						</option>
					@endforeach
				</select>
			{{ Form::close() }}
		</div>

		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="span6">Titre</th>
					<th class="span2">Statut</th>
					<th class="span1" colspan=2>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($articles as $article)
				<tr>
					<td>{{ $article->titre }}</td>
					<td>{{ $article->state ? 'Publié' : 'Non publié' }}</td>
					<td class="center">
						<a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-medium btn-info"><i class="icon-pencil icon-white"></i> Modifier</a>
					</td>
					<td class="center">
						{{ Form::open(array('url' => 'articles/'.$article->id, 'method' => 'DELETE')) }}
						<button class="btn btn-medium btn-danger" onclick="return confirm('Vraiment supprimer cet article ?')" type="submit">
							<i class="icon-fire icon-white"></i>
							 Supprimer
						</button>
		                {{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $articles->links(); }}
	</div>
</div>
@stop