@props(['news'])

<article class="card">
  @if($news->image_url)
    <img class="thumb" src="{{ $news->image_url }}" alt="{{ $news->title }}">
  @endif
  <div class="body">
    <a href="{{ url('/news/'.$news->slug) }}" style="color:#e2e8f0; font-weight:700; font-size:18px; text-decoration:none">
      {{ $news->title }}
    </a>

    <div class="meta">
      @if($news->category)
        <span class="badge">{{ $news->category }}</span>
      @endif
      <span>{{ optional($news->published_at)->format('d/m/Y H:i') }}</span>
    </div>

    @if($news->summary)
      <p class="summary">{{ \Illuminate\Support\Str::limit($news->summary, 180) }}</p>
    @endif

    <div class="footer">
      <a class="btn" href="{{ url('/news/'.$news->slug) }}">อ่านต่อ →</a>
      @if($news->source_url)
        <a class="btn" href="{{ $news->source_url }}" target="_blank" rel="noopener">แหล่งข่าว</a>
      @endif
    </div>
  </div>
</article>