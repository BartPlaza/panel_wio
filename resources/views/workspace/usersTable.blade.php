@extends('panel')
@section('workspace')
	<div class="usersTable_tools">
			<a href="/panel/addUser"><i class="fa fa-plus" aria-hidden="true"></i>  Dodaj uczestnika</a></td>
			<form action="/panel/usersTable/filter" method="get" class="filter_form">
				<div class="filter_form_item">
				<label for="sex_filter">Płeć </label>
				<select id="sex_filter" name="sex_filter" class="selectpicker">
					<option selected value="">All</option>
					<option value="K">Kobieta</option>
					<option value="M">Mężczyzna</option>
				</select>
				</div>
				<div class="filter_form_item">
				<label class="filter_label" for="age_filter">Wiek </label>
				<select id="age_filter" name="age_filter" class="selectpicker">
					<option selected value="">All</option>
					<option value="0|25">< 25</option>
					<option value="25|31">25 - 30</option>
					<option value="31|100">> 30</option>
				</select>
				</div>
				<div class="filter_form_item">
					<button class="btn btn-xs btn-default" type="submit">Filtruj</button>
				</div>
			</form>
	</div>
	<hr style="margin: 0 0 5px 0;">

	<table class="users_table table">
		<thead>
			<tr>
				<th>Lp.</th>
				<th>ID</th>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th>Płeć</th>
				<th>Email</th>
				<th>Telefon</th>
				<th>Wiek</th>
				<th>Status</th>
				<th>Grupa</th>
			</tr>						
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td></td>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->surname}}</td>
					<td>{{$user->sex}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->phone}}</td>
					<td>{{$user->getAge()}}</td>
					<td>{{$user->getStatus()}}</td>
					<td>{{$user->group_id}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection