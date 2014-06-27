<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Blog</title>

	<!-- Bootstrap core CSS -->
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')}}

</head>
<body>
	
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="/" class="navbar-brand">My blog</a>
			</div>
		</div>

		<ul class="nav navbar-nav">
			<li><a href="/post">文章</a></li>
			<li><a href="/friend">好友</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="/logout">登出</a></li>
		</ul>
	</nav>

	@yield('content')

</body>
</html>