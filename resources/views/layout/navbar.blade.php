<nav id="wio_navbar">
	<div class="navbar_left">
		<a href="/" class="navbar_item navbar_title">Panel WIO</a>
		<a href="/panel" class="navbar_item">Obszar roboczy</a>
	</div>
	<div class="navbar_right">
		@if(!Auth::check())
			<a href="/login" class="navbar_item">Zaloguj</a>
		@endif
		@if(Auth::check())
			<a href="#" class="navbar_item">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
			<a href="/logout" class="navbar_item">Wyloguj</a>
		@endif
		<a href="#" class="navbar_item">Pomoc</a>
	</div>
</nav>