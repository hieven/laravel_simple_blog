<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Hello, {{ $user->fisrt_name }} {{ $user->last_name}}</h2>
		<p>Please click URL below to activate your account.</p><hr>

		<div>
			{{ link_to_route('auth.activated', 'Please Click me!', [$user->id] ,['class' => 'btn btn-primary'])}}	
		</div>
	</body>
</html>
