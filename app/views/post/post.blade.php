@extends('layouts.navbar')

@section('content')

	<div class="col-md-10 col-md-offset-1">
		{{ Form::open(array('url' => 'post')) }}

			@if($errors->any())
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert"></a>
					{{ implode('', $errors->all('<li class="error">:message</li>')) }}
				
				</div>
			@endif
			
			<div class="form-group">
				{{ Form::label('title', '標題')}}
				{{ Form::text('title', '', array('class' => 'form-control'))}}
			</div>

			<div class="form-group">
				{{ Form::label('body', '內容')}}
				{{ Form::textarea('body', '', array('class' => 'form-control'))}}
			</div>

			{{ Form::submit('發佈', array('class' => 'btn btn-primary'))}}
			{{ link_to('user', '取消', array('class' => 'btn btn-warning'))}}
		{{ Form::close() }}
	</div>

@stop