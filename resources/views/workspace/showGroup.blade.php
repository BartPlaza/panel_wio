@extends('panel')
@section('workspace')
	<div class="semester_tools">
		<a href="#"> Example tool</a>
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