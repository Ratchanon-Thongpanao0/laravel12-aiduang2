<x-layouts.app :title="'รายการข่าว'">
  <div class="grid">
    @foreach($news as $n)
      <article class="card">
        @if($n->image_url)
          <img class="thumb" src="{{ $n->image_url }}" alt="{{ $n->title }}">
        @endif
        <div class="body">
          <div class="title">{{ $n->title }}</div>
          <div class="meta">
            {{ $n->category }} • {{ optional($n->published_at)->format('d/m/Y H:i') }}
          </div>
          <p class="summary">{{ \Illuminate\Support\Str::limit($n->summary, 180) }}</p>

          <div style="display:flex; gap:8px; flex-wrap:wrap; margin-top:8px">
            <!-- ปุ่มอ่านต่อ -->
            <a class="btn" href="{{ route('news.show', $n) }}">อ่านต่อ →</a>

            <!-- ปุ่มแก้ไข -->
            <a class="btn" href="{{ route('news.edit', $n) }}">แก้ไข</a>

            <!-- ปุ่มลบ -->
            <form action="{{ route('news.destroy', $n) }}" method="POST"
                  onsubmit="return confirm('ลบข่าวนี้?')">
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