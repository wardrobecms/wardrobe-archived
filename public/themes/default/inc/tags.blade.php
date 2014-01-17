<ul class="tags">
	@foreach ($post->tags as $item)
		@if ($item->tag != "")
			<li><a href="{{ Wardrobe::route('posts.tags', $item->tag) }}">{{ $item->tag }}</a></li>
		@endif
	@endforeach
</ul>
