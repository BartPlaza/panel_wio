@extends('panel')
@section('workspace')
<div class="user_container">
	<div class="user_profile well">
		<div class="user_profile_nav">
			<span>
				{{$user->name.' '.$user->surname}}
			</span>
			<a href="/panel/usersTable"><i class="fa fa-times" aria-hidden="true"></i></a> 
		</div>
		<div class="user_profile_body">
			<div class="user_profile_photo">
				<i class="fa fa-user" aria-hidden="true"></i>
			</div>
			<div class="user_profile_data">
				<div class="user_profile_row">

					<span class="col-lg-3">Płeć:</span>
					<span class="col-lg-3">{{$user->sex}}</span>
					<span class="col-lg-3">Wiek:</span>
					<span class="col-lg-3">{{$user->getAge()}}</span>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-lg-3">Data ur.:</span>
					<span class="col-lg-9">{{$user->birthDate}}</span>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-lg-3">Email:</span>
					<span class="col-lg-9">{{$user->email}}</span>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-lg-3">Tel.:</span>
					<span class="col-lg-9">{{$user->phone}}</span>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-lg-3">Utworzono:</span>
					<span class="col-lg-3">{{$user->getCreatedDate()}}</span>
					<span class="col-lg-3">Grupa:</span>
					<span class="col-lg-3">{{$user->getLider()}}</span>
				</div>			
			</div>
		</div>
		<div class="user_profile_footer">
			<div class="user_profile_footer_buttons">
				<span>
					<a href="#" class="btn btn-info"><i class="fa fa-envelope" aria-hidden="true"></i></a>
				</span>
				<span class="user_profile_footer_buttons_right">
					<form action="/panel/user/{{$user->id}}" method="post" class="user_profile_footer_button">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button class="btn btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
					</form>
					<form action="/panel/user/{{$user->id}}" method="post" class="user_profile_footer_button">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
					</form>
				</span>
			</div>
			<form class="user_profile_errors">
				@include('auth.errors')
			</form>	
		</div>
	</div>
</div>
@endsection