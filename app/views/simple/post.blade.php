@extends(theme_view('layout'))

@section('title')
  {{ $post->title }}
@stop

@section('content')
  <section>
    <h2 class="title">{{ $post->title }}</h2>
    {{ $post->parsed_content }}
  </section>
@stop

