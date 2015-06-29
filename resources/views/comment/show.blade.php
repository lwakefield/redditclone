<li class="list-group-item">
	<div class="row">
		<div class="col-xs-1">
			@include('vote.create', ['action' => "/c/$comment->id/vote"])
		</div>
		<div class="col-xs-9">
			<p>{{ $comment->content }}</p>
		</div>
		<div class="col-xs-2">
			<button class="btn btn-default btn-xs pull-right" data-toggle="collapse" data-target=".c{{ $comment->id }}">Reply</button>
		</div>
	</div>
	@include('comment.create', ['comment_id' => $comment->id])
	@if (count($comment->comments))
		<ul class="list-group">
			@foreach ($comment->comments as $comment)
				@include('comment.show', ['comment' => $comment])
			@endforeach
		</ul>
	@endif
</li>