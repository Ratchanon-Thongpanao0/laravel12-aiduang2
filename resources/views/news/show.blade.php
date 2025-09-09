<x-layouts.app :title="$news->title">
  <article class="card">
    @if($news->image_url)
      <img class="thumb" src="{{ $news->image_url }}" alt="{{ $news->title }}">
    @endif

    <div class="body">
      <h1 style="font-size: 1.8rem; margin-bottom:10px;">{{ $news->title }}</h1>
      <div class="meta">
        {{ $news->category }} • {{ optional($news->published_at)->format('d/m/Y H:i') }}
      </div>
      <p style="margin-top:15px; line-height:1.6;">
        {{ $news->content }}
      </p>
    </div>

    <div style="margin-top:20px;">
      <a href="{{ route('news.index') }}" class="btn">← กลับหน้าหลัก</a>
      <a href="{{ route('news.edit', ['news' => $news->id]) }}" class="btn">แก้ไข</a>
      <form action="{{ route('news.destroy', ['news' => $news->id]) }}" method="POST"
            style="display:inline;" onsubmit="return confirm('ลบข่าวนี้?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">ลบ</button>
      </form>
    </div>
  </article>
</x-layouts.app>