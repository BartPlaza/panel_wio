@extends('layout.template')
@section('content')
	<div id="panel_container">
		<div id="panel_workspace" class="col-md-10 col-sm-12">
			@yield('workspace')
		</div>
		<div id="panel_sidebar" class="col-md-2 col-sm-12">
			<div class="sidebar_item">
				<a href="/panel/usersTable"><i class="fa fa-database" aria-hidden="true"></i> Baza uczestników </a>
			</div>
			<div class="sidebar_item">
				<a href="/panel/calendar"><i class="fa fa-calendar" aria-hidden="true"></i> Kalendarz </a>
			</div>
			<div class="sidebar_item">
				<a href="/panel/groups"><i class="fa fa-users" aria-hidden="true"></i> Grupy </a>
			</div>
		</div>
	</div>
@endsection