<li class="list-group-item">
	<div class="row">
		<div class="col-xs-10">
			<p>{{ $comment->content }}</p>
		</div>
		<div class="col-xs-2">
			<button class="btn btn-default btn-xs pull-right" data-toggle="collapse" data-target=".c{{ $comment->id }}">Reply</button>
		</div>
		
	</div>
	<div class="row">
		<form class="col-xs-offset-2 col-xs-8 collapse c{{ $comment->id }}" action="/c/{{ $comment->id }}/reply" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="comment_id" value="{{ $comment->id }}">
			<div class="form-group">
				<textarea class="form-control" type="text" name="content" placeholder="Content"></textarea>
			</div>
			<div class="form-group">
				<input class="form-control btn-primary" type="submit" value="Reply">
			</div>
		</form>
	</div>
	@if (count($comment->comments))
		<ul class="list-group">
			@foreach ($comment->comments as $comment)
				@include('partials.comment', ['comment' => $comment])
			@endforeach
		</ul>
	@endif
</li>