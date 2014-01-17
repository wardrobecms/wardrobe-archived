{{ '<?xml version="1.0"?>' }}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>{{ e(Config::get('wardrobe.title')) }}</title>
		<link>{{ URL::route('home') }}</link>
		<atom:link href="{{ URL::route('rss') }}" rel="self" type="application/rss+xml" />
		<description></description>
		<copyright>{{ Config::get('wardrobe.title') }}</copyright>
		<ttl>30</ttl>

		@foreach ($posts as $post)
			<item>
				<title>{{ $post->title }}</title>
				<description>
					{{ htmlspecialchars($post->parsed_content) }}
				</description>
				<link>{{ URL::route('post', $post->slug) }}</link>
				<guid isPermaLink="true">{{ URL::route('post', $post->slug) }}</guid>
				<pubDate>{{ $post->rss_date }}</pubDate>
			</item>
		@endforeach
	</channel>
</rss>
