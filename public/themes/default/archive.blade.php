@extends(theme_view('layout'))

@section('title')
  Archives
@stop

@section('content')
  <section>

    {{-- Archive Heading --}}
    {{-- Notice the triple brackets to escape any xss for tags and search term. --}}
    @if (isset($tag))
      <h2 class="title">{{{ ucfirst($tag) }}} Archives</h2>
    @elseif (isset($search))
      <h2 class="title">Results for {{{ $search }}}</h2>
    @else
      <h2 class="title">Archives</h2>
    @endif

    @foreach ($posts as $post)
      @include(theme_view('inc.post'))
    @endforeach

    {{ $posts->appends(array('q' => Input::get('q')))->links() }}

  </section>
@stop
