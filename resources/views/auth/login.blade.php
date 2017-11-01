@extends('layout.template')
@section('content')
	<form method="post" action="#" class="well login_form">
		{{ csrf_field() }}
		<div class="form-group text-center text-uppercase">
			Logowanie
		</div>
		<hr>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email">
		</div>
		<div class="form-group">
			<label for="password">Hasło</label>
			<input type="password" class="form-control" id="password">
		</div>
		<hr>
		<div class="text-center">
			<button type="submit" class="btn btn-primary form-control"><b>Zaloguj</b></button>
		</div>
	</form>
@endsection