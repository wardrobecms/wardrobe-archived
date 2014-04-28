@extends('default.layout')

@section('title')
	{{ $post->title }}
@stop

@section('content')

	<section>

		<h2 class="title">{{ $post->title }}</h2>

		@if ($post->image)
			<div class="leader-img"><img src="/{{ Config::get('wardrobe.image_dir') }}/{{ $post->image }}" alt="{{ $post->title }}"/></div>
		@endif

		{{ $post->parsed_content }}

		@include('default.inc.tags')

		<div class="prev-next">
			@if ($prev)
			<a href="{{ URL::route('post', $prev->slug) }}">&#8592; {{ $prev->title }}</a>
			@endif

			@if ($next)
			<a href="{{ URL::route('post', $next->slug) }}" class="next">{{ $next->title }} &#8594;</a>
			@endif
		</div>

	</section>

@stop

