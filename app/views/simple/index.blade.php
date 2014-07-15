@extends(theme_view('layout'))

@section('title')
	{{ Config::get('wardrobe.title') }}
@stop

@section('content')
	<section class="home">
    <h2>Recent Posts</h2>
    <ul class="archive">
	    @foreach ($posts as $post)
        <li>
          <span><i class="icon-calendar"></i>{{ $post->publish_date->format("M d, Y") }}</span> <strong><a href="{{ URL::route('post', $post->slug) }}">{{ $post->title }}</a></strong>
        </li>
      @endforeach
    </ul>
	</section>
@stop
