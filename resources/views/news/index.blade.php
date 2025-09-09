<x-layouts.app :title="'รายการข่าว'">
  <div class="grid">
    @foreach($news as $item)
      <article class="card">
        @if($item->image_url)
          <img class="thumb" src="{{ $item->image_url }}" alt="{{ $item->title }}">
        @endif

        <div class="body">
          <div class="title">{{ $item->title }}</div>
          <div class="meta">
            {{ $item->category }} • {{ optional($item->published_at)->format('d/m/Y H:i') }}
          </div>
          <p class="summary">{{ \Illuminate\Support\Str::limit($item->summary, 180) }}</p>

          <div style="display:flex; gap:8px; flex-wrap:wrap; margin-top:8px">
            <!-- อ่านต่อ -->
            <a class="btn" href="{{ route('news.show', ['news' => $item->id]) }}">อ่านต่อ →</a>

            <!-- แก้ไข -->
            <a class="btn" href="{{ route('news.edit', ['news' => $item->id]) }}">แก้ไข</a>

            <!-- ลบ -->
            <form action="{{ route('news.destroy', ['news' => $item->id]) }}"
                  method="POST" onsubmit="return confirm('ลบข่าวนี้?')">
              @csrf
              @method('DELETE')
              <button class="btn" type="submit">ลบ</button>
            </form>
          </div>
        </div>
      </article>
    @endforeach
  </div>

  <!-- pagination -->
  <div class="pagi">
    {{ $news->onEachSide(1)->links() }}
  </div>
</x-layouts.app>