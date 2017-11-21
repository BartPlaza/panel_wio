@extends('panel')
@section('workspace')
	<div class="usersTable_tools">
			
	</div>
	<hr style="margin: 0 0 5px 0;">

	<table class="table">
		<thead>
			<tr>
				<th></th>
				@foreach($weeks as $week)
					<th>{{$week->name}}</th>
				@endforeach
			</tr>						
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->name.' '.$user->surname}}</td>
				@foreach($weeks as $week)
					<td><vue-attendance user_id="{{$user->id}}" 
										week_id="{{$week->id}}" 
										value="{{$user->getAttendance($week)}}"
										>
					
					</vue-attendance></td>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection