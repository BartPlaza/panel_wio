@extends('panel')
@section('workspace')

<div class="addGroup_form">
	<form method="post" action="/panel/addGroup" class="well">
		{{ csrf_field() }}
		<div class="form-group text-center text-uppercase">
			Dodaj lidera grupy
		</div>
		<hr>
		<div class="form-group col-md-12">
			<select class="form-control" id="lider_id" name="lider_id">
				@foreach($users as $user)
					<option value='{{$user->id}}'>{{$user->name.' '.$user->surname}}</option>
				@endforeach
			</select>		
		</div>
		<hr class="col-md-12">
		<div class=" form-group text-center col-md-6">
			<button type="submit" class="btn btn-success col-md-6 col-md-offset-6"><b>Utwórz</b></button>
		</div>
		<div class=" form-group text-center col-md-6">
			<a href="/panel/groups"><div class="btn btn-danger col-md-6"><b>Anuluj</b></div></a>
		</div>
		<div class="col-md-12">
		@include('auth.errors')
		</div>
	</form>
</div>
@endsection