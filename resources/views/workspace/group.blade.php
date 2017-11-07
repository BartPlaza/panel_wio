@extends('panel')
@section('workspace')
	<div class="group_tools">
		<a href="/panel/addGroup"><i class="fa fa-plus" aria-hidden="true"></i>  Dodaj grupę</a></td>
		<div class="groups_list">
			@foreach($groups as $group)
				<a href="/panel/groups/{{$group->id}}" class="btn btn-default">{{$group->lider()->name}} {{$group->lider()->surname}}</a>
			@endforeach
		</div>
	</div>
@endsection('workspace')