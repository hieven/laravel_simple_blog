<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')

	<!-- Bootstrap core CSS -->
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')}}

</head>
<body>
	
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-info">
			@yield('content')
		</div>
	</div>

</body>
</html>