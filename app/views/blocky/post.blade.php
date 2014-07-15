@extends(theme_view('layout'))

@section('title')
  {{ $post->title }}
@stop

@section('content')
  <section class="post">
    <h2 class="title">{{ $post->title }}</h2>

    {{ $post->parsed_content }}

    @include(theme_view('inc.tags'))
</section>
@stop

