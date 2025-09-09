<x-layouts.app :title="'รวมข่าวล่าสุด'">
  <div class="grid">
    @foreach($news as $n)
      <article class="card">
        @if($n->image_url)
          <img class="thumb" src="{{ $n->image_url }}" alt="{{ $n->title }}">
        @endif
        <div class="body">
          <a class="title" href="{{ url('/news/'.$n->slug) }}">{{ $n->title }}</a>
          <div class="meta">
            {{ $n->category }} • {{ optional($n->published_at)->format('d/m/Y H:i') }}
          </div>
          @if($n->summary)
            <p class="summary">{{ \Illuminate\Support\Str::limit($n->summary, 180) }}</p>
          @endif
          <a class="btn" href="{{ url('/news/'.$n->slug) }}">อ่านต่อ →</a>
        </div>
      </article>
    @endforeach
  </div>

  {{-- ★ ห่อ pagination ด้วย .pagi เพื่อสไตล์และซ่อน “Showing …” --}}
  <div class="pagi">
    {{ $news->onEachSide(1)->links() }}
  </div>
</x-layouts.app>