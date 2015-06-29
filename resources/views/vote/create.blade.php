<form action="{{ $action }}" method="post">
	{!! csrf_field() !!}
	<div class="btn-group-vertical">
		<button class="btn btn-default btn-xs glyphicon glyphicon-chevron-up" type="submit" name="dir" value="1"></button>
		<button class="btn btn-default btn-xs glyphicon glyphicon-chevron-down" type="submit" name="dir" value="-1"></button>
	</div>
</form>