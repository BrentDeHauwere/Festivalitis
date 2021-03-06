@extends('master')

@section('script')
	<!-- Default active menu item: home -->
	<script>
		$(document).ready(function ()
		{
			$('div.menu a.item').first().addClass('active');
		});
	</script>

	<!-- Timeago: a jQuery plugin that makes it easy to support automatically updating fuzzy timestamps (e.g. "4 minutes ago" or "about 1 day ago"). -->
	<script src="{{ asset('/js/jquery.timeago.js') }}" type="text/javascript"></script>
	<script>
		jQuery(document).ready(function ()
		{
			jQuery("time.timeago").timeago();
		});
	</script>

	<!-- Line-up: description on hover -->
	<script>
		$(document).ready(function ()
		{
			$('.special.cards .image').dimmer({
				on: 'hover'
			});
		});
	</script>
@endsection

@section('ajax')
	<script>
		$(document).ready(function ()
		{
			/**
			 * Message system: show message to user
			 * @param {String} type
			 * @param {String} description
			 * @param {String} title
			 * @param {Number} delay
			 */
			function initMessage(type, description, title, delay) {
				// Default parameters
				if (typeof(title) === 'undefined')
					title = type.charAt(0).toUpperCase() + type.slice(1);
				if (typeof(delay) === 'undefined')
					delay = 5000;

				$('.message').removeClass('error success info warning').addClass(type);
				$('.message .header').html(title);
				$('.message span').html(description);
				$('.message').fadeIn().delay(delay).fadeOut();
			}

			/**
			 * Message system: show error messages on form to user
			 * @param {String} errors
			 * @param {String} form
			 */
			function initErrorMessages(errors, form) {
				$.each(errors, function (key, value)
				{
					$(form + ' [name=' + key + ']:input')
						.parent().append('<div class="ui pointing red basic label">' + value + '</div>');
				});
			}

			/**
			 * Message system: clear error messages on form
			 * @param {String} form
			 */
			function clearErrorMessages(form) {
				$(form + ' .ui.pointing.red.basic.label').remove();
			}

			// ---------- Home: select artist ----------
			$("input[list=artists]").on('input', function ()
			{
				var val = this.value;
				if ($('#artists').find('option').filter(function ()
					{
						return this.value.toUpperCase() === val.toUpperCase();
					}).length)
				{
					var artistHeader = $('#LineUp .header:contains(' + this.value + ')');

					$('html, body').animate({
						scrollTop: artistHeader.parents('.column').offset().top - $('.menu').height()
					}, 500);
				}
			});

			// ---------- News: add comment ----------
			$('.formComment').submit(function (event)
			{
				event.preventDefault();

				var form = $(this);

				// If description is empty, don't do anything
				if (!form.find('[name=description]:input').val())
					return;

				$.ajax({
					url: '{{ action('CommentController@store') }}',
					type: 'POST',
					dataType: 'json',
					data: form.serialize(),
					success: function (data)
					{
						// Clear input field
						form.find('[name=description]:input').val('');

						// Add comment in view
						console.log(data);
						console.log(data.user.email);

						var a = document.createElement('div');
						a.textContent = data.description;

						form.prev().append('<div class="ui comments"><div class="comment"><a class="avatar"><img src="image/user/' + data.user_id + '"></a> <div class="content"><span class="author">' + data.user.fname + ' ' + data.user.lname + '</span><div class="metadata"><span class="date"><time class="timeago" datetime="' + data.created_at + '">July 17, 2008</time></span></div><div class="text">' + a.innerHTML +'</div></div></div></div>');
						form.prev().find('time.timeago').timeago();

						// Message: success
						initMessage('success', 'Comment was added successfully.');
					},
					error: function (request)
					{
						console.log(request);
					}
				});
			});

			// ---------- Contact: send mail ----------
			$('#formContact').submit(function (event)
			{
				event.preventDefault();
				clearErrorMessages('#formContact');

				$.ajax({
					url: '{{ action('MailController@send') }}',
					type: 'POST',
					data: $('#formContact').serialize(),
					success: function ()
					{
						initMessage('success', 'Mail was sent successfully.');
					},
					error: function (request)
					{
						switch (request.status)
						{
							case 422:
								initMessage('error', 'Mail was not sent. Please fill out the form correctly.');
								initErrorMessages(request.responseJSON, '#formContact');
								break;
							default:
								initMessage('error', 'Mail was not sent. Error ' + request.status + ': ' + request.statusText + '.');
								break;
						}
					}
				});
			});
		});
	</script>
@endsection

@section('content')
	<!-- Home -->
	<div class="ui inverted vertical masthead center aligned segment" id="Home">
		<div class="background"></div>
		<div class="ui text container">
			<h1 class="ui inverted header">
				Festivalitis
			</h1>
			<h2>The best festival in the world on the 30th of June.</h2>
			<div class="ui search">
				<div class="ui icon input">
					<input type="text" placeholder="Find your favorite artist..." autocomplete="on" list="artists">
					<i class="search icon"></i>
				</div>
				<datalist id="artists" class="results">
					@foreach($artists as $artist)
						<option value="{{ $artist->name }}"><input type="hidden" value="{{ $artist->id }}"></option>
					@endforeach
				</datalist>
			</div>
		</div>
	</div>

	<!-- Line-up -->
	<div class="ui segment" id="LineUp">
		<h1 class="ui header teal">
			<i class="calendar icon"></i>
			<div class="content">
				Line-up
			</div>
		</h1>

		<div class="ui special cards four column grid">
			@foreach($artists as $artist)
				<div class="column">
					<div class="ui fluid card teal">
						<div class="blurring dimmable image">
							<div class="ui dimmer">
								<div class="content">
									<div class="center">
										{{ $artist->description }}
									</div>
								</div>
							</div>
							<img src="{{ action('ImageController@show', ['type' => 'artist', 'filename' => $artist->id]) }}">
						</div>
						<div class="content teal">
							<p class="header">{{ $artist->name }}</p>
						</div>
						<div class="extra content">
							<span class="date">
									<i class="calendar icon"></i>
								{{ date('H:i', strtotime($artist->begin)) }} - {{ date('H:i', strtotime($artist->end)) }}
							</span>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<!-- News -->
	<div class="ui segment" id="News">
		<h1 class="ui header teal">
			<i class="newspaper icon"></i>
			<div class="content">
				News
			</div>
		</h1>

		<div class="ui cards one column grid">
			@foreach($news as $item)
				<div class="column">
					<div class="ui fluid card">
						<div class="content">
							<div class="header left floated">{{ $item->title }}</div>
							<div class="meta">
								<span class="right floated time"><time class="timeago" datetime="{{ $item->created_at }}">
										July 17, 2008
									</time></span>
							</div>
							<div class="description">
								<p>{{ $item->description }}</p>
							</div>
						</div>
						@if(count($item->comments) > 0)
							<div class="extra content">
								@foreach($item->comments as $comment)
									<div class="ui comments">
										<div class="comment">
											<a class="avatar">
												<img src="{{ action('ImageController@show', ['type' => 'user', 'filename' => $comment->user_id]) }}">
											</a>
											<div class="content">
												<span class="author">{{ "{$comment->user->fname} {$comment->user->lname}" }}</span>
												<div class="metadata">
													<span class="date"><time class="timeago" datetime="{{ $comment->created_at }}">
															July 17, 2008
														</time></span>
												</div>
												<div class="text">
													{{ $comment->description }}
												</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						@endif
						@if(Auth::check())
							<form class="ui bottom attached action input formComment">
								{{ csrf_field() }}
								<input type="hidden" name="news_id" value="{{ $item->id }}">
								<input type="text" name="description" placeholder="Comment" autocomplete="off">
								<button class="ui teal right labeled icon button" type="submit">
									Add Comment
									<i class="edit icon"></i>
								</button>
							</form>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	</div>

	@if(Auth::check())
		<!-- Tickets -->
		<div class="ui segment" id="Tickets">
			<h1 class="ui header teal">
				<i class="ticket icon"></i>
				<div class="content">
					Convinced? Buy your tickets now!
				</div>
			</h1>

			<div class="ui segment">
				<form class="ui form" action="{{ action('TicketController@store') }}" method="post">
					{{ csrf_field() }}
					<div class="required field">
						<label for="amount">Amount</label>
						<select id="amount" name="amount" class="ui dropdown" required>
							@for($i = 1; $i < 11; $i++)
								<option value="{{ $i }}">{{ $i . ' - € ' . ($i * 20) }}</option>
							@endfor
						</select>
					</div>
					<button class="ui button right labeled icon teal fluid" type="submit">
						<i class="icon send"></i>
						Buy
					</button>
				</form>
			</div>
		</div>
	@endif

	<!-- Contact -->
	<div class="ui segment" id="Contact">
		<h1 class="ui header teal">
			<i class="mail outline icon"></i>
			<div class="content">
				Contact
			</div>
		</h1>

		<div class="ui segment">
			<form class="ui form" id="formContact">
				{{ csrf_field() }}
				<div class="required field">
					<label>First Name</label>
					<input type="text" name="fname" placeholder="First Name" required>
				</div>
				<div class="required field">
					<label>Last Name</label>
					<input type="text" name="lname" placeholder="Last Name" required>
				</div>
				<div class="required field">
					<label>Email</label>
					<input type="email" name="email" placeholder="Email" required>
				</div>
				<div class="required field">
					<label>Message</label>
					<textarea name="message" placeholder="Message" required></textarea>
				</div>
				<button class="ui button right labeled icon teal fluid" type="submit">
					<i class="icon send"></i>
					Submit
				</button>
			</form>
		</div>
	</div>
@endsection