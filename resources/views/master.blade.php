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
			$(document).ready(function() {
				$('.menu')
					.on('click', '.item', function() {
						if(!$(this).hasClass('dropdown')) {
							$(this)
								.addClass('active')
								.siblings('.item')
								.removeClass('active');
						}
					});
			});
		</script>

		@yield('script')
	</head>
	<body>
		<!-- Navigation -->
		<div class="ui secondary top fixed pointing menu">
			<a class="item active" href="#Home">
				Home
			</a>
			<a class="item" href="#LineUp">
				Line-up
			</a>
			<a class="item" href="#News">
				News
			</a>
			<a class="item" href="#Contact">
				Contact
			</a>
			<div class="right menu">
				<a class="ui item">
					Login
				</a>
			</div>
		</div>

		<!-- Content -->
		@yield('content')
	</body>
</html>
