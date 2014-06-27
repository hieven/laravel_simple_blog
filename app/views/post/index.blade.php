@extends('layouts.navbar')

@section('content')
	
	<div class="container">
		{{ link_to_route('post.create', '發表文章', null, array('class' => 'btn btn-primary')) }}
		<hr>

		@foreach($posts as $p)
			<article class="col-md-8">
				<h2>{{ $p->title }}</h2><hr>
				<p> {{ mb_substr($p->body, 0, 100, 'UTF-8'). '...' }}</p><br>
				{{ link_to_route('post.show', '閱讀全文', $p->id) }}
			</article>
		@endforeach
	</div>

@stop