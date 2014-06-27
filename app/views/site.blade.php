@extends('layouts.navbar')

@section('content')
	<div class="col-md-8 col-md-offset-1">
		@foreach($posts as $p)
			<article>
				<h2>{{ $p->title }}</h2>
				<p>{{ substr($p->body, 0, 120). '...' }}</p>
				{{ link_to_route('post.show', '閱讀全文', $p->id) }}
				<p>post by {{ $p->user->first_name .' '. $p->user->last_name }} {{ $p->getHumanTime() }}</p>
			</article>
		@endforeach
		{{ $posts->links() }}
	</div>
	
	<div class="col-md-3">
		{{ Form::open(array('url' => '/')) }}
		<div class="form-group">
			{{ Form::label('search', 'Search') }}
			{{ Form::text('search', null, ['class' => 'form-control']) }}
		</div>
		{{ Form::submit('click', ['class' => 'btn btn-default']) }}
		{{ Form::close() }}
	</div>
@stop