@extends('panel')
@section('workspace')
	<div class="groups_tools">
		<a href="/panel/addGroup"><i class="fa fa-plus" aria-hidden="true"></i>  Dodaj grupę</a></td>
	</div>
	<div class="groups_list">
		@foreach($groups as $group)
			<a href="/panel/groups/{{$group->id}}" class="btn btn-default col-xs-12">{{$group->lider()->name}} {{$group->lider()->surname}}</a>
		@endforeach
	</div>
@endsection('workspace')