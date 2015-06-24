<li class="list-group-item">
	<div class="row">
		<div class="col-xs-1">
			<div class="btn-group-vertical">
				<button class="btn btn-default btn-xs glyphicon glyphicon-chevron-up"></button>
				<button class="btn btn-default btn-xs glyphicon glyphicon-chevron-down"></button>
			</div>
		</div>
		<div class="col-xs-9">
			<p>{{ $comment->content }}</p>
		</div>
		<div class="col-xs-2">
			<button class="btn btn-default btn-xs pull-right" data-toggle="collapse" data-target=".c{{ $comment->id }}">Reply</button>
		</div>
	</div>
	@include('comment.partials.create', ['comment_id' => $comment->id])
	@if (count($comment->comments))
		<ul class="list-group">
			@foreach ($comment->comments as $comment)
				@include('comment.partials.show', ['comment' => $comment])
			@endforeach
		</ul>
	@endif
</li>