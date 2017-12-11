@extends('panel')
@section('workspace')
	<div class="semester_tools">
		<a href="/panel/addSemester"><i class="fa fa-plus" aria-hidden="true"></i>  Dodaj semestr</a>
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