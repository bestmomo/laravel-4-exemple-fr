@extends('backend/layouts/default')

@section('content')

<div class="span10 offset1">
	<div class="well">

		<div class="page-header">
			<h3>
				Gestion des catégories

				<div class="pull-right">
					<a href="{{ url('categories/create') }}" class="btn btn-medium btn-info"><i class="icon-plus-sign icon-white"></i> Créer</a>
				</div>
			</h3>
			<hr>
			{{ Form::open(array(
				'url' => url('categories/show'),
				'id' => 'form',
				'onchange' => 'document.getElementById("form").submit()'
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
		</div>

		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="span7">Titre</th>
					<th class="span1" colspan=2>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $categorie)
				<tr>
					<td>{{ $categorie->titre }}</td>
					<td class="center">
						<a href="{{ url('categories/'.$categorie->id.'/edit') }}" class="btn btn-medium btn-info"><i class="icon-pencil icon-white"></i> Modifier</a>
					</td>
					<td class="center">
						{{ Form::open(array('url' => 'categories/'.$categorie->id, 'method' => 'DELETE')) }}
						<button class="btn btn-medium btn-danger" onclick="return confirm('Vraiment supprimer cette catégorie ?')" type="submit">
							<i class="icon-fire icon-white"></i>
							 Supprimer
						</button>
		                {{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>
@stop