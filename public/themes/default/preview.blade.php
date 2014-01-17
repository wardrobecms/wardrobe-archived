@extends(theme_view('layout'))

@section('title')
	Post Preview
@stop

@section('content')
	<section>
		<h2 class="title"></h2>
		<div class="js-content"></div>
	</section>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jStorage/0.3.0/jstorage.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/marked/0.2.9/marked.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var initial = $.jStorage.get("post-{{ $id }}");
			$(".title").html(initial.title);
			$(".js-content").html(marked(initial.content));

			$.jStorage.subscribe("post-{{ $id }}", function(channel, data){
				$(".title").html(data.title);
				$(".js-content").html(marked(data.content));
			});
		});
	</script>
@stop

