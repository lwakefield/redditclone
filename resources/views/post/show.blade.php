@extends('layout.default')

@section('title', $post->title)

@section('content')

<div class="jumbotron">
	<div>
		<div class="btn-group-vertical pull-left">
			<button class="btn btn-default btn-xs glyphicon glyphicon-chevron-up"></button>
			<button class="btn btn-default btn-xs glyphicon glyphicon-chevron-down"></button>
		</div>
		<button class="btn btn-default pull-right" data-toggle="collapse" data-target=".p{{ $post->id }}">Reply</button>
	</div>
	<h1 class="text-center">
		<a href="/p/{{ $post->id }}">{{ $post->title }}</a>
	</h1>
	<p>{{ $post->content }}</p>
	
	@include('comment.partials.create', ['post_id' => $post->id])
</div>

<ul class="list-group">
	@foreach ($post->comments as $comment)
		@include('comment.partials.show', ['comment' => $comment])
	@endforeach
</ul>

@endsection