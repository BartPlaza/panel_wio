@extends('panel')
@section('workspace')
<div class="addSemester_form">
	<form method="post" action="/panel/addSemester" class="well">
		{{ csrf_field() }}
		<div class="form-group text-center text-uppercase">
			Dodaj semestr
		</div>
		<hr>
		<div class="form-group col-md-3">
			<label for="year">Rok</label>
			<input type="number" min="2010" max="2050" class="form-control" id="year" name="year">
		</div>
		<div class="form-group col-md-3">
			<label for="season">Sezon</label>
			<select class="form-control" id="season" name="season">
				<option selected disabled hidden value=''></option>
				<option value="lato">Lato</option>
				<option value="zima">Zima</option>
			</select>
		</div>
		<div class="form-group col-md-3">
			<label for="startDate">Data pierwszego spotkania</label>
			<input type="date" class="form-control" id="startDate" name="startDate">
		</div>
		<div class="form-group col-md-3">
			<label for="endDate">Data ostatniego spotkania</label>
			<input type="date" class="form-control" id="endDate" name="endDate">
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