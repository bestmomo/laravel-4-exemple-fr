@extends('backend/layouts/default')

@section('content')

<div class="span12">
	<div class="well">

		<div class="page-header">
			<h3>Gestion des utilisateurs</h3>
		</div>

		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="span4">Identifiant</th>
					<th class="span4">E-mail</th>
					<th class="span3">Rôle</th>
					<th class="span1" colspan=2>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>
					@if ($user->role_id == 1) utilisateur
					@elseif ($user->role_id == 2) rédacteur
					@else administrateur
					@endif
					</td>
					<td class="center">
						<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-medium btn-info"><i class="icon-pencil icon-white"></i> Modifier</a>
					</td>
					<td class="center">
						{{ Form::open(array('url' => 'users/'.$user->id, 'method' => 'DELETE')) }}
						<button class="btn btn-medium btn-danger" onclick="return confirm('Vraiment supprimer cet utilisateur ?')" type="submit">
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