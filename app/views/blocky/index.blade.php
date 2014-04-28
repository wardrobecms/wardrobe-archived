@extends(theme_view('layout'))

@section('title')
	{{ Config::get('wardrobe.title') }}
@stop

@section('content')
	<section class="home">
		@foreach ($posts as $post)
	      @include(theme_view('inc.post'))
	    @endforeach

	    {{ $posts->links() }}
	</section>
@stop
