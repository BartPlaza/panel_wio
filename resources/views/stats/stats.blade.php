@extends('panel')
@section('workspace')

	<div class="usersTable_tools">
		<form action="/panel/stats" method="get" class="filter_form">
			<div class="filter_form_item">
			<label for="semester_id">Semestr </label>
			<select id="semester_id" name="semester_id" class="selectpicker">
				@foreach($semesters as $sem)
				<option value="{{$sem->id}}"
						@if($sem->id == $semester->id) selected	@endif>
						{{$sem->year.' '.$sem->season}}</option>
				@endforeach
			</select>
			</div>
			<div class="filter_form_item">
				<button class="btn btn-xs btn-default" type="submit">Pokaż</button>
			</div>
		</form>	
		<a href="#"><i class="fa fa-plus" aria-hidden="true"></i>  #</a>		
	</div>
	<hr style="margin: 0 0 5px 0;">
	<div class="attendance-container">
	<table class="table">
		<thead>
			<tr>
				@foreach($weeks as $week)
					<th>{{$week->name}}
						{{$week->simpleDate()}}</th>
				@endforeach
			</tr>						
		</thead>
		<tbody>
			<tr class="attendance-row">
				@foreach($weeks as $week)
				<td>{{$week->presentUsers().' / '.$week->allUsers()}}</td>
				@endforeach
			</tr>
		</tbody>
	</table> 
	</div>

@endsection