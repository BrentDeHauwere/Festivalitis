@extends('master')

@section('script')
	<script>
		// ---------- Source: http://www.w3schools.com/js/js_cookies.asp ----------
		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i = 0; i <ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length,c.length);
				}
			}
			return "";
		}

		$(document).ready(function ()
		{
			// ---------- Open the last opened tab ----------
			$('#ConfigurationPanel .tabular.menu .item').removeClass('active');
			switch (getCookie('activeTab'))
			{
				case 'artists':
					$('#ConfigurationPanel .tabular.menu [data-tab=artists].item').addClass('active');
					$.tab('change tab', 'artists');
					break;
				case 'news':
					$('#ConfigurationPanel .tabular.menu [data-tab=news].item').addClass('active');
					$.tab('change tab', 'news');
					break;
				default:
					$('#ConfigurationPanel .tabular.menu [data-tab=accounts].item').addClass('active');
					$.tab('change tab', 'accounts');
					break;
			}

			$('.menu .item')
				.tab()
			;

			$('#ConfigurationPanel .tabular.menu .item').click(function ()
			{
				document.cookie = 'activeTab=' + $(this).attr('data-tab');
			});
		});
	</script>
@endsection

@section('content')
	<div class="ui segment" id="ConfigurationPanel">
		@if(session('success'))
			<div class="ui success message">
				<i class="close icon"></i>
				<div class="header">
					Success
				</div>
				<p>{{ session('success') }}</p>
			</div>
		@endif

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

		<h1 class="ui header teal">
			<i class="configure icon"></i>
			<div class="content">
				Configuration Panel
			</div>
		</h1>

		<div class="ui top attached tabular menu">
			<a class="item" data-tab="accounts">Accounts</a>
			<a class="item" data-tab="artists">Artists</a>
			<a class="item" data-tab="news">News</a>
		</div>

		<!-- Add Account -->
		<div class="ui bottom attached tab segment active" data-tab="accounts">
			<form class="ui form group" action="{{action('UserController@store')}}" method="post">

				<div class="field required {{ $errors->has('fname') ? 'error' : '' }}">
					<label for="fname">First Name</label>
					<input id="fname" type="text" name="fname" value="{{ old('fname') }}" placeholder="First Name" required>
				</div>

				<div class="field required {{ $errors->has('lname') ? 'error' : '' }}">
					<label for="lname">Last Name</label>
					<input id="lname" type="text" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required>
				</div>

				<div class="field required {{ $errors->has('email') ? 'error' : '' }}">
					<label for="email">Email</label>
					<input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
				</div>

				<div class="field required {{ $errors->has('password') ? 'error' : '' }}">
					<label for="password">Password</label>
					<input id="password" type="password" name="password" placeholder="Password" required>
				</div>

				<div class="field required {{ $errors->has('password_confirmation') ? 'error' : '' }}">
					<label for="password_confirmation">Confirm password</label>
					<input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password" required>
				</div>

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<button class="ui button primary right floated" type="submit">Create User</button>
			</form>
		</div>

		<!-- Add Artist -->
		<div class="ui bottom attached tab segment" data-tab="artists">
			<form class="ui form group" action="{{action('ArtistController@store')}}" method="post" enctype="multipart/form-data">

				<div class="field required {{ $errors->has('name') ? 'error' : '' }}">
					<label for="name">Name</label>
					<input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
				</div>

				<div class="field required {{ $errors->has('description') ? 'error' : '' }}">
					<label for="description">Description</label>
					<textarea id="description" name="description" placeholder="Description" required>{{ old('description') }}</textarea>
				</div>

				<div class="field required {{ $errors->has('begin') ? 'error' : '' }}">
					<label for="begin">Begin</label>
					<input id="begin" type="time" name="begin" value="{{ old('begin') }}" placeholder="Begin" required>
				</div>

				<div class="field required {{ $errors->has('end') ? 'error' : '' }}">
					<label for="end">End</label>
					<input id="end" type="time" name="end" value="{{ old('End') }}" placeholder="End" required>
				</div>

				<div class="field required {{ $errors->has('image') ? 'error' : '' }}">
					<label for="image">Image</label>
					<input id="image" type="file" name="image" value="{{ old('image') }}" required>
				</div>

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<button class="ui button primary right floated" type="submit">Create Artist</button>
			</form>
		</div>

		<!-- Add News -->
		<div class="ui bottom attached tab segment" data-tab="news">
			<form class="ui form group" action="{{action('NewsController@store')}}" method="post">

				<div class="field required">
					<label for="title">Title</label>
					<input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Title" required>
				</div>

				<div class="field required">
					<label for="description">Description</label>
					<textarea id="description" name="description" placeholder="Description" required>{{ old('description') }}</textarea>
				</div>

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<button class="ui button primary right floated" type="submit">Create Artist</button>
			</form>
		</div>
	</div>
@endsection