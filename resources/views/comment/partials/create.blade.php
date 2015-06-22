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