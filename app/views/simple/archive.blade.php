@extends(theme_view('layout'))

@section('title')
  Archives
@stop

@section('content')
  <section class="row home">
    @if (isset($tag))
      <h2 class="title">{{ ucfirst($tag) }} Archives</h2>
    @else
      <h2 class="title">Archives</h2>
    @endif

    <ul class="archive">
	    @foreach ($posts as $post)
	    <li>
		    <span><i class="icon-calendar"></i>{{ $post->publish_date->format("M d, Y") }}</span> <strong><a href="{{ URL::route('post', $post->slug) }}">{{ $post->title }}</a></strong>
	    </li>
	    @endforeach
    </ul>
  </section>
@stop
