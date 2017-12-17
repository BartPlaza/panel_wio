@extends('layout.template')
@section('content')
	<div id="panel_container">
		<div id="panel_workspace" class="col-md-10 col-sm-12">
			@yield('workspace')
		</div>
		<div id="panel_sidebar" class="col-md-2 col-sm-12">
			@if(Auth::user()->isAdmin())
			<div class="sidebar_item">
				<a href="/panel/usersTable"><i class="fa fa-database" aria-hidden="true"></i> Baza uczestników </a>
			</div>
			<div class="sidebar_item">
				<a href="/panel/groups"><i class="fa fa-users" aria-hidden="true"></i> Grupy </a>
			</div>
			@endif
			<div class="sidebar_item">
				<a href="/panel/calendar"><i class="fa fa-calendar" aria-hidden="true"></i> Kalendarz </a>
			</div>
			<div class="sidebar_item">
				<a href="/panel/attendance"><i class="fa fa-th-list" aria-hidden="true"></i> Obecności </a>
			</div>
			@if(Auth::user()->isAdmin())
			<div class="sidebar_item">
				<a href="/panel/stats"><i class="fa fa-line-chart" aria-hidden="true"></i> Statystyki </a>
			</div>
			@endif
		</div>
	</div>
@endsection