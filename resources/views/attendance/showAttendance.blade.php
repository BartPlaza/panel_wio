@extends('panel')
@section('workspace')
	<div class="usersTable_tools">
			
	</div>
	<hr style="margin: 0 0 5px 0;">
	<div class="attendance-container">
	<table class="table">
		<thead>
			<tr>
				<th></th>
				@foreach($weeks as $week)
					<th>{{$week->name}}
						{{$week->simpleDate()}}</th>
				@endforeach
			</tr>						
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr class="attendance-row">
				<td>{{$user->name.' '.$user->surname}}</td>
				@foreach($weeks as $week)
					<td><vue-attendance user_id="{{$user->id}}" 
										week_id="{{$week->id}}" 
										value="{{$user->getAttendance($week)}}">			
					</vue-attendance></td>
				@endforeach
			</tr>
			@endforeach
			<tr>
				<td></td>
				@foreach($weeks as $week)
				 <td><vue-attendance-sum week_id="{{$week->id}}"></vue-attendance-sum></td>
				@endforeach
			</tr>
		</tbody>
	</table>
	<vue-attendance-chart></vue-attendance-chart>
	</div>
@endsection