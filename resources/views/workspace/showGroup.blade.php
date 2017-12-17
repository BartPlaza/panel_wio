@extends('panel')
@section('workspace')
	<div class="group_tools">
		<div class="group_tools_left">
			<a href="/panel/groups/{{$id}}/addUsers" class="btn btn-link">Dodaj osoby</a>
			<a href="/panel/groups/{{$id}}/deleteUsers" class="btn btn-link">Usuń osoby</a>
			<a href="/panel/groups/{{$id}}/changeLider" class="btn btn-link">Zmień lidera</a>
			<form action="/panel/groups/{{$id}}" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button type="submit" class="btn btn-link">Usuń grupę</button>
			</form>
		</div>
		<div class="group_tools_right">
			<a href="/panel/groups" class="btn btn-link"> Wróć</a>
		</div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Wiek</th>
			</tr>						
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->surname}}</td>
					<td>{{$user->getAge()}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection('workspace')