@extends('panel')
@section('workspace')
<form action="#" method="post">
	{{csrf_field()}}
	<table class="table">
		<thead>
			<tr>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Wiek</th>
				<th><b>Wybierz</b></th>
			</tr>						
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->surname}}</td>
					<td>{{$user->getAge()}}</td>
					<td><input type="radio" name="selected" value="{{$user->id}}"></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection('workspace')