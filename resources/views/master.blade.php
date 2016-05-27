<!DOCTYPE html>
<html>
	<head>
		<title>Festivalitis</title>

		<!-- Semantic UI - CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('/semantic/dist/semantic.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/customize_semantic.css') }}">

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<!-- Semantic UI - JS -->
		<script src="{{ asset('/semantic/dist/semantic.min.js') }}"></script>
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

		<!-- Message system - jQuery: close -->
		<script>
			$(document).ready(function()
			{
				$('.message .close')
					.on('click', function ()
					{
						$(this)
							.closest('.message')
							.transition('fade', function ()
							{
								$(this).remove();
							})
						;
					});
			});
		</script>

		<script>
			$(document).ready(function ()
			{
				$('.laravelMessage').delay(5000).fadeOut(400, function ()
				{
					$(this).remove();
				});
			});
		</script>

		<!-- Submit user image when selected -->
		<script type="text/javascript">
			$(function ()
			{
				$('#imageUser').change(function ()
				{
					$('#setUserImage').submit();
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
			@if(Auth::check())
				<a class="item" href="{{ action('HomeController@index') }}#Tickets">
					Tickets
				</a>
			@endif
			<a class="item" href="{{ action('HomeController@index') }}#Contact">
				Contact
			</a>
			<div class="right menu">
				@if(Auth::check())
					<div class="ui dropdown item" id="user">
						{{ Auth::user()->fname . ' ' . Auth::user()->lname }}
						<img class="ui avatar image" src="{{ action('ImageController@show', ['type' => 'user', 'filename' => Auth::id()]) }}">
						<div class="menu">
							@if(Auth::user()->admin)
								<a class="ui item" href="{{ action('HomeController@configurationPanel') }}">
									<i class="configure icon"></i>
									Configuration Panel
								</a>
							@endif
							<form id="setUserImage" method="post" action="{{ action('UserController@image') }}" enctype="multipart/form-data">{{ csrf_field() }}</form>
							<a class="item">
								<label for="imageUser" class="ui icon" style="cursor: pointer"><i class="file image outline icon"></i>Set
									Picture</label>
								<input type="file" id="imageUser" name="image" form="setUserImage" style="display:none">
							</a>
							<a class="ui item" href="{{ action('AuthController@logout') }}">
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

		<!-- Message system - jQuery -->
		<div class='ui success message'>
			<div class='header'>
				Placeholder
			</div>
			<i class='close icon'></i>
			<span>Placeholder</span>
		</div>

		<!-- Message system - Laravel -->
		@if(session('success'))
			<div class="ui success message laravelMessage">
				<i class="close icon"></i>
				<div class="header">
					Success
				</div>
				<p>{{ session('success') }}</p>
			</div>
		@endif
		@if(session('error'))
			<div class="ui success message laravelMessage">
				<i class="close icon"></i>
				<div class="header">
					Error
				</div>
				<p>{{ session('error') }}</p>
			</div>
			@endif

		<!-- Content -->
		@yield('content')
	</body>
</html>
