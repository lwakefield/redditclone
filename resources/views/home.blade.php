@extends('layout.default')

@section('title', 'Reddit Clone 2')

@section('content')

@foreach (array_chunk($subs->items(), 3) as $chunk)
	<div class="row">
		@foreach ($chunk as $sub)
			<div class="col-xs-12 col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3><a href="/r/{{ $sub->id }}">{{ $sub->name }}</a></h3>
		
						<ol>
						@foreach ($sub->posts as $post)
							<li>
								<a href="/p/{{ $post->id }}">{{ $post->title }}</a>
							</li>
						@endforeach
						</ol>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endforeach

<div class="text-center">
	{!! $subs->render() !!}
</div>

@endsection