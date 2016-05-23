<p>
	You have received a new message from your website contact form.
</p>
<p>
	Here are the details:
</p>
<ul>
	<li>First name: <strong>{{ $mail['fname'] }}</strong></li>
	<li>Last name: <strong>{{ $mail['lname'] }}</strong></li>
	<li>Email: <strong>{{ $mail['email'] }}</strong></li>
</ul>
<hr>
<p>
	{{ $mail['message'] }}
</p>
<hr>