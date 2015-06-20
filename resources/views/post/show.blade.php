@extends('layout.default')

@section('title', $post->title)

@section('content')

<div class="jumbotron">
	<h1 class="text-center"><a href="/r/{{ $post->id }}">{{ $post->title }}</a></h1>
	<p>{{ $post->content }}</p>
</div>

<ul class="list-group">
	@foreach ($post->comments as $comment)
		@include('partials.comment', ['comment' => $comment])
	@endforeach
</ul>

@endsection