<!DOCTYPE html>
<html>
	<head>
		<title>Festivalitis</title>

		<!-- Semantic UI - CSS -->
		<link rel="stylesheet" type="text/css" href="/semantic/dist/semantic.min.css">
		<link rel="stylesheet" type="text/css" href="/css/customize_semantic.css">

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<!-- Semantic UI - JS -->
		<script src="/semantic/dist/semantic.min.js"></script>
		<script>
			$(document).ready(function ()
			{
				$('.menu')
					.on('click', '.item', function ()
					{
						if (!$(this).hasClass('dropdown'))
						{
							$(this)
								.addClass('active')
								.siblings('.item')
								.removeClass('active');
						}
					});

				$('.ui.dropdown')
					.dropdown()
				;
			});
		</script>

		<!-- Message system: close -->
		<script>
			$(document).ready(function()
			{
				$('.message .close')
					.on('click', function ()
					{
						$(this)
							.closest('.message')
							.transition('fade')
						;
					});
			});
		</script>

		@yield('script')

		@yield('ajax')
	</head>
	<body>
		<!-- Navigation -->
		<div class="ui secondary top fixed pointing menu">
			<a class="item" href="{{ action('HomeController@index') }}#Home">
				Home
			</a>
			<a class="item" href="{{ action('HomeController@index') }}#LineUp">
				Line-up
			</a>
			<a class="item" href="{{ action('HomeController@index') }}#News">
				News
			</a>
			<a class="item" href="{{ action('HomeController@index') }}#Contact">
				Contact
			</a>
			<div class="right menu">
				@if(Auth::check())
					<div class="ui dropdown item" id="user">
						{{ Auth::user()->fname . ' ' . Auth::user()->lname }}
						<div class="menu">
							<a class="ui red item" href="{{ action('HomeController@configurationPanel') }}">
								<i class="configure icon"></i>
								Configuration Panel
							</a>
							<a class="ui red item" href="{{ action('AuthController@logout') }}">
								<i class="sign out icon"></i>
								Logout
							</a>
						</div>
					</div>
				@else
					<a class="ui item" href="{{ action("AuthController@login") }}">
						Login
					</a>
				@endif
			</div>
		</div>

		<!-- Message system -->
		<div class='ui success message'>
			<div class='header'>
				Placeholder
			</div>
			<i class='close icon'></i>
			<span>Placeholder</span>
		</div>

		<!-- Content -->
		@yield('content')
	</body>
</html>
