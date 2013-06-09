@extends('backend/layouts/default')

@section('content')

<div class="span8 offset2">
	<div class="well">

		<div class="page-header">
			<h3>
				Gestion des sections

				<div class="pull-right">
					<a href="{{ url('sections/create') }}" class="btn btn-medium btn-info"><i class="icon-plus-sign icon-white"></i> Créer</a>
				</div>
			</h3>
		</div>

		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="span6">Titre</th>
					<th class="span1" colspan=2>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($sections as $section)
				<tr>
					<td>{{ $section->titre }}</td>
					<td class="center">
						<a href="{{ url('sections/'.$section->id.'/edit') }}" class="btn btn-medium btn-info"><i class="icon-pencil icon-white"></i> Modifier</a>
					</td>
					<td class="center">
						{{ Form::open(array('url' => 'sections/'.$section->id, 'method' => 'DELETE')) }}
						<button class="btn btn-medium btn-danger" onclick="return confirm('Vraiment supprimer cette section ?')" type="submit">
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