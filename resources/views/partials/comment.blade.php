<li class="list-group-item">
	<p>{{ $comment->content }}</p>
	@if (count($comment->comments))
		<ul class="list-group">
				@foreach ($comment->comments as $comment)
					@include('partials.comment', ['comment' => $comment])
				@endforeach
		</ul>
	@endif
</li>