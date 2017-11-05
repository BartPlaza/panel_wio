@extends('panel')
@section('workspace')
	<div class="semester_tools">
		<a href="/panel/addSemester"><i class="fa fa-plus" aria-hidden="true"></i>  Dodaj semestr</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				@foreach($weeks as $week)
					<th>{{$week->name}}</th>
				@endforeach
			</tr>						
		</thead>
		<tbody>
			<tr>
				@foreach($weeks as $week)
					<td>{{$week->date}}</td>
				@endforeach
			</tr>
		</tbody>
	</table>
@endsection('workspace')