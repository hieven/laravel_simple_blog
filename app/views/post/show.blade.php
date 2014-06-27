@extends('layouts.navbar')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h2>{{ $post->title }}</h2><hr>

				<p>{{ $post->body }}</p><br>

				<div class="article-footer">

					<span>{{ $author }} {{ $post->getHumanTime() }}</span>

					@if(Sentry::getUser()->id == $post->user_id)
						{{ link_to_route('post.edit', '編輯', $post->id, array('class' => 'btn btn-success')) }}
						{{ Form::open(array('method' => 'DELETE', 'route' => array('post.destroy', $post->id), 'style' => 'display:inline-block')) }}
						{{ Form::submit('刪除', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}
					@endif
				</div>
				<hr>	
			</div>
		</div>

		<div class="row">
			<div class="col-md-9">
				{{ Form::open(array('url' => 'post/'. $post->id)) }}
				<div class="form-group">
					{{ Form::label('body', '留言：') }}
					{{ Form::textarea('body', '', array('class' => 'form-control')) }}
				</div>
					{{ Form::submit('回覆', array('class' => 'btn btn-default')) }}
				{{ Form::close() }}<hr>
			</div>
		</div>
				
		

		@if(count($comments))
			@foreach($comments as $comm)
			<div class="row">
				<div class="col-md-9">
					<p>{{ $comm->body }}</p>
					
					<p>{{ $comm->userName() }} {{ $comm->getHumanTime() }}</p>
					
					@if(Sentry::getUser()->id == $comm->user_id)

						{{ link_to_route('comment.edit', '編輯', $comm->id, array('class' => 'btn btn-success')) }}
						{{ Form::open(array('method' => 'DELETE', 'route' => array('comment.destroy', $comm->id), 'style' => 'display:inline-block')) }}
						{{ Form::submit('刪除', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}

					@endif

					<hr>
				</div>
			</div>
			@endforeach
		@else
			<div class="row">
				<div class="col-md-9">
					目前沒有任何留言
				</div>
			</div>
		@endif
		
	</div>

@stop