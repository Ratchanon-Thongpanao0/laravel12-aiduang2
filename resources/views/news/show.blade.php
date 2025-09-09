<x-layouts.app :title="$news->title">
  <h1 style="margin:0 0 8px; font-size:clamp(22px,3vw,32px)">{{ $news->title }}</h1>
  <div class="meta">{{ $news->category }} • {{ optional($news->published_at)->format('d/m/Y H:i') }}</div>

  @if($news->image_url)
    <img class="hero" src="{{ $news->image_url }}" alt="{{ $news->title }}">
  @endif

  @if($news->summary)
    <p class="summary" style="-webkit-line-clamp:unset">{{ $news->summary }}</p>
  @endif

  @if($news->content)
    <div class="prose">{{ $news->content }}</div>
  @endif

  <div style="margin-top:12px; display:flex; gap:10px; flex-wrap:wrap">
    <a class="btn" href="{{ route('news.index') }}">← กลับหน้าแรก</a>
    <a class="btn" href="{{ route('news.edit', $news) }}">แก้ไข</a>
    <form action="{{ route('news.destroy', $news) }}" method="POST" onsubmit="return confirm('ลบข่าวนี้?')">
      @csrf @method('DELETE')
      <button class="btn" type="submit">ลบ</button>
    </form>
    @if($news->source_url)
      <a class="btn" href="{{ $news->source_url }}" target="_blank" rel="noopener">แหล่งข่าว</a>
    @endif
  </div>
</x-layouts.app>