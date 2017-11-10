@extends('panel')
@section('workspace')
<form action="/panel/groups/{{$id}}/deleteUsers" method="post">
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
					<td><input type="checkbox" name="selected[]" value="{{$user->id}}"></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<hr class="col-md-12">
	<div class=" form-group text-center col-md-6">
		<button type="submit" class="btn btn-success col-md-3 col-md-offset-9"><b>Usuń z grupy</b></button>
	</div>
	<div class=" form-group text-center col-md-6">
		<a href="/panel/groups"><div class="btn btn-danger col-md-3"><b>Anuluj</b></div></a>
	</div>
	<div class="col-md-12">
		@include('auth.errors')
	</div>
</form>
@endsection('workspace')