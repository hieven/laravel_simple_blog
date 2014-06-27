@extends('layouts.navbar')

@section('content')
	
	<div class="col-md-10 col-md-offset-1">
		{{ Form::model($post, array('method' => 'PATCH', 'route' => array('post.update', $post->id))) }}
			<div class="form-group">
				{{ Form::label('title', '標題')}}
				{{ Form::text('title', Input::old('title'), array('class' => 'form-control'))}}
			</div>

			<div class="form-group">
				{{ Form::label('body', '內容')}}
				{{ Form::textarea('body', Input::old('body'), array('class' => 'form-control'))}}
			</div>

			{{ Form::submit('發佈', array('class' => 'btn btn-primary'))}}
			{{ link_to_route('post.show', '取消', $post->id, array('class' => 'btn btn-warning'))}}
		{{ Form::close() }}
	</div>

@stop