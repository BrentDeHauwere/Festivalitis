@extends('master')

@section('script')
	<!-- Timeago: a jQuery plugin that makes it easy to support automatically updating fuzzy timestamps (e.g. "4 minutes ago" or "about 1 day ago"). -->
	<script src="/js/jquery.timeago.js" type="text/javascript"></script>
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
						<option value="{{ $artist->name }}">
					@endforeach
				</datalist>
			</div>
		</div>
	</div>

	<!-- Line-up -->
	<div class="ui segment" id="LineUp">
		<h1 class="ui header">
			<i class="calendar icon"></i>
			<div class="content">
				Line-up
			</div>
		</h1>

		<div class="ui special cards four column grid">
			@foreach($artists as $artist)
				<div class="column">
					<div class="ui fluid card">
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
						<div class="content">
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
		<h1 class="ui header">
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
							<div class="ui bottom attached action input">
								<input type="text">
								<button class="ui teal right labeled icon button">
									Add Comment
									<i class="edit icon"></i>
								</button>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<!-- Contact -->
	<div class="ui segment" id="Contact">
		<h1 class="ui header">
			<i class="mail outline icon"></i>
			<div class="content">
				Contact
			</div>
		</h1>
	</div>
@endsection