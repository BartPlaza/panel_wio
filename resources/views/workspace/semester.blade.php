@extends('panel')
@section('workspace')
	<div class="semester_tools">
		<div class="semester_tools_left">
			<form action="/panel/semester/{{$semester->id}}" method="post">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button type="submit" class="btn btn-link">Usuń semestr</button>
			</form>
		</div>
		<div class="semester_tools_right">
			<a href="/panel/calendar">Wróć</a>
		</div>
	</div>
	<table class="table">
		<thead>
			<tr>
				@foreach($weeks as $week)
					<th>{{$week->name}}
					@if($week->nextDate())
					<i class="fa fa-arrow-down" aria-hidden="true"></i>	
					@endif</th>
				@endforeach
			</tr>						
		</thead>
		<tbody>
			<tr>
				@foreach($weeks as $week)
					<td>{{$week->simpleDate()}}</td>
				@endforeach
			</tr>
			<tr>
				@foreach($weeks as $week)
					<td class="semester_week_title">{{$week->subject}}</td>
				@endforeach
			</tr>
		</tbody>
	</table>
@endsection('workspace')