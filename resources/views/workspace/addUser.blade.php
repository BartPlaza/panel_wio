@extends('panel')
@section('workspace')
<div class="addUser_form">
	<form method="post" action="/panel/addUser" class="well">
		{{ csrf_field() }}
		<div class="form-group text-center text-uppercase">
			Dodaj uczestnika
		</div>
		<hr>
		<div class="form-group col-md-6">
			<label for="name">Imię</label>
			<input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
		</div>
		<div class="form-group col-md-6">
			<label for="surname">Nazwisko</label>
			<input type="text" class="form-control" id="surname" name="surname" value="{{old('surname')}}">
		</div>
		<div class="form-group col-md-6">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
		</div>
		<div class="form-group col-md-6">
			<label for="phone">Telefon</label>
			<input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
		</div>
		<div class="form-group col-md-6">
			<label for="sex">Płeć</label>
			<select class="form-control" id="sex" name="sex">
				<option @if(old('sex') == '') selected @endif disabled hidden value=''></option>
				<option @if(old('sex') == 'K') selected @endif value="K">Kobieta</option>
				<option @if(old('sex') == 'M') selected @endif value="M">Mężczyzna</option>
			</select>
		</div>
		<div class="form-group col-md-6">
			<label for="birthDate">Data urodzenia</label>
			<input type="date" class="form-control" id="birthDate" name="birthDate" value="{{old('birthDate')}}">
		</div>

		<hr class="col-md-12">
		<div class=" form-group text-center col-md-6">
			<button type="submit" class="btn btn-success col-md-offset-9 col-md-3"><b>Dodaj</b></button>
		</div>
		<div class=" form-group text-center col-md-6">
			<a href="/panel/usersTable"><div class="btn btn-danger col-md-3"><b>Anuluj</b></div></a>
		</div>
		<div class="col-md-12">
		@include('auth.errors')
		</div>
	</form>
</div>
@endsection