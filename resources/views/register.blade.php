<!DOCTYPE html>
<!-- Template: http://semantic-ui.com/usage/layout.html#pages -->
<html>
	<head>
		<!-- Standard Meta -->
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<!-- Site Properties -->
		<title>The Great Wall - Login</title>
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/reset.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/site.css">

		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/container.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/grid.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/header.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/image.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/menu.css">

		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/divider.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/segment.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/form.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/input.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/button.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/list.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/message.css">
		<link rel="stylesheet" type="text/css" href="/semantic/dist/components/icon.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="/semantic/dist/components/form.js"></script>
		<script src="/semantic/dist/components/transition.js"></script>

		<style type="text/css">
			body {
				background-color: #DADADA;
			}
			body > .grid {
				height: 100%;
			}
			.image {
				margin-top: -100px;
			}
			.column {
				max-width: 450px;
			}
			.message {
				width: 90%;
				left: 5%;
				top: 40px;
				position: fixed !important;
			}
		</style>
	</head>
	<body>
		@if (count($errors) > 0)
			<div class="ui error message">
				<i class="close icon"></i>
				<div class="header">
					Errors - Please fill out the form correctly
				</div>
				<ul class="list">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="ui middle aligned center aligned grid">
			<div class="column">
				<h2 class="ui teal image header">
					<i src="" class="pin icon"></i>
					<div class="content">
						Register into Festivalitis
					</div>
				</h2>
				<form class="ui large form" action="{{ action('UserController@store') }}" method="post">
					<div class="ui segment">
						<div class="field required {{ $errors->has('fname') ? 'error' : '' }}">
							<input id="fname" type="text" name="fname" value="{{ old('fname') }}" placeholder="First Name" required>
						</div>

						<div class="field required {{ $errors->has('lname') ? 'error' : '' }}">
							<input id="lname" type="text" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required>
						</div>

						<div class="field required {{ $errors->has('email') ? 'error' : '' }}">
							<input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
						</div>

						<div class="field required {{ $errors->has('password') ? 'error' : '' }}">
							<input id="password" type="password" name="password" placeholder="Password" required>
						</div>

						<div class="field required {{ $errors->has('password_confirmation') ? 'error' : '' }}">
							<input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password" required>
						</div>

						<button class="ui fluid large teal submit button">Register</button>
					</div>
					{{ csrf_field() }}
					<div class="ui error message"></div>
				</form>
			</div>
		</div>
	</body>
</html>