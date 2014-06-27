@extends('layouts.navbar')

@section('content')
	
	<div class="col-md-10 col-md-offset-1">
		{{ Form::model($comm, array('method' => 'PATCH', 'route' => array('comment.update', $comm->id))) }}
			<div class="form-group">
				{{ Form::label('body', '內容')}}
				{{ Form::textarea('body', Input::old('body'), array('class' => 'form-control'))}}
			</div>

			{{ Form::submit('發佈', array('class' => 'btn btn-primary'))}}
			{{ link_to_route('post.show', '取消', $comm->article_id, array('class' => 'btn btn-warning'))}}
		{{ Form::close() }}
	</div>

@stop