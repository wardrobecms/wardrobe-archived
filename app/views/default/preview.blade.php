@extends(theme_view('layout'))

@section('title')
	Post Preview
@stop

@section('content')

	<section>
		<h2 class="title"></h2>
		<div class="leader-img js-image"></div>
		<div class="js-content"></div>
	</section>

@stop


@section('footerjs')
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="/packages/wardrobe/cabinet/admin/js/jstorage.js"></script>
<script src="/packages/wardrobe/cabinet/admin/js/marked.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var initial = $.jStorage.get("post-{{ $id }}");

		$(".post").addClass(initial.type);
		$(".title").html(initial.title);
		$(".js-content").html(marked(initial.content));

		$.jStorage.subscribe("post-{{ $id }}", function(channel, data){
			$(".title").html(data.title);
			$(".js-content").html(marked(data.content));
		});
	});
</script>
@stop