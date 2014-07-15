<div class="post">
	<h1><a href="{{ URL::route('post', $post->slug) }}">{{ $post->title }}</a></h1>
	<div class="date">{{ $post->publish_date->format("M/d/Y") }}</div>
	<div class="content">
		{{ $post->parsed_content }}
	</div>

	@include(theme_view('inc.tags'))
</div>
