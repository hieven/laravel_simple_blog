@extends('layouts.auth')

@section('title')
	<title>Login</title>
@stop

@section('content')
	<div class="panel-heading">登入</div>
	<div class="panel-body">
		{{ Form::open(array('url' => 'login')) }}
		
		@if($errors->any())
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert"></a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			
			</div>
		@endif

		<div class="form-group">
			{{ Form::label('email', '信箱 ') }}
			{{ Form::email('email', '', array('class' => 'form-control'))}}
		</div>

		<div class="form-group">
			{{ Form::label('password', '密碼 ') }}
			{{ Form::password('password', array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{ Form::submit('登入', array('class' => 'btn btn-success')) }}
			{{ HTML::link('/', '取消', array('class' => 'btn btn-warning'))}}
		</div>
		{{ Form::close() }}
	</div>
@stop
	
	