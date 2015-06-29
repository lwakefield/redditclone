@extends('layout.default')

@section('title', $post->title)

@section('content')

<div class="jumbotron">
	<div>
		<div class="pull-left">
			@include('vote.create', ['action' => "/p/$post->id/vote", 'score' => $post->score])
		</div>
		<button class="btn btn-default pull-right" data-toggle="collapse" data-target=".p{{ $post->id }}">Reply</button>
	</div>
	<h1 class="text-center">
		<a href="/p/{{ $post->id }}">{{ $post->title }}</a>
	</h1>
	<p>{{ $post->content }}</p>
	
	@include('comment.create', ['post_id' => $post->id])
</div>

<ul class="list-group">
	@foreach ($post->comments as $comment)
		@include('comment.show', ['comment' => $comment])
	@endforeach
</ul>

@endsection