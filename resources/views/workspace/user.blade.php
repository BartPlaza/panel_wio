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
					<span class="col-xs-3">Płeć:</span>
					<span class="col-xs-3">{{$user->sex}}</span>
					<span class="col-xs-3">Wiek:</span>
					<span class="col-xs-3">{{$user->getAge()}}</span>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-xs-3">Data ur.:</span>
					<vue-user-data class="col-xs-9" user_id="{{$user->id}}" column ="birthDate" value="{{$user->birthDate}}" type="date"></vue-user-data>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-xs-3">Email:</span>
					<vue-user-data class="col-xs-9" user_id="{{$user->id}}" column ="email" value="{{$user->email}}" type="email"></vue-user-data>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-xs-3">Tel.:</span>
					<vue-user-data class="col-xs-9" user_id="{{$user->id}}" column ="phone" value="{{$user->phone}}" type="text"></vue-user-data>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-xs-3">Utworzono:</span>
					<span class="col-xs-3">{{$user->getCreatedDate()}}</span>
					<span class="col-xs-3">Grupa:</span>
					<span class="col-xs-3">{{$user->getLider()}}</span>
				</div>
				<hr class="user_profile_hr">
				<div class="user_profile_row">
					<span class="col-xs-3"></span>
					<span class="col-xs-3"></span>
					<span class="col-xs-3">Uprawnienia:</span>
					<span class="col-xs-3">
						@foreach($user->roles as $role)
						{{$role->name}}
						@endforeach	
					</span>
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