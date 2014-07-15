<div class="post">
  <h1><a href="{{ wardrobe_url('/post/'.$post->slug) }}">{{ $post->title }}</a></h1>
  <div class="date">{{ date("M/d/Y", strtotime($post->publish_date)) }}</div>
  <div class="content">
    {{ $post->parsed_content }}
  </div>
</div>
