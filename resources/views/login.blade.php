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
		@if(session('error'))
			<!-- Message system -->
			<div class='ui error message'>
				<div class='header'>
					Error
				</div>
				<span>{{ session('error') }}</span>
			</div>
		@endif

		<div class="ui middle aligned center aligned grid">
			<div class="column">
				<h2 class="ui teal image header">
					<i src="" class="pin icon"></i>
					<div class="content">
						Login into Festivalitis
					</div>
				</h2>
				<form class="ui large form" action="{{ action('AuthController@login') }}" method="post">
					<div class="ui segment">
						<div class="field">
							<div class="ui left icon input">
								<i class="user icon"></i>
								<input type="email" name="email" placeholder="E-mail address" required>
							</div>
						</div>
						<div class="field">
							<div class="ui left icon input">
								<i class="lock icon"></i>
								<input type="password" name="password" placeholder="Password" required>
							</div>
						</div>
						<button class="ui fluid large teal submit button">Login</button>
					</div>
					{{ csrf_field() }}
					<div class="ui error message"></div>
				</form>
			</div>
		</div>
	</body>
</html>