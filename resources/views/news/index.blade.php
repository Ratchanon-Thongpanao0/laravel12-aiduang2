<x-layouts.app :title="'รายการข่าว'">
  {{-- แถบค้นหา/กรอง --}}
  <form method="get" class="card rounded-2xl border border-slate-700 p-4 mb-4">
    <div class="flex flex-wrap items-center gap-2">
      <input
        name="q"
        value="{{ $q }}"
        placeholder="ค้นหาชื่อข่าวหรือเนื้อหา…"
        class="w-64 px-3 py-2 rounded-xl bg-[#0b1226] border border-slate-600/50"
      >
      <select name="category" class="px-3 py-2 rounded-xl bg-[#0b1226] border border-slate-600/50">
        <option value="">— ทุกหมวด —</option>
        @foreach($categories as $c)
          <option value="{{ $c }}" @selected($cat===$c)>{{ $c }}</option>
        @endforeach
      </select>

      <button class="btn-ghost">ค้นหา</button>
      <a href="{{ route('news.index') }}" class="btn-ghost">ล้างตัวกรอง</a>

      
    </div>
  </form>

  @if($news->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      @foreach($news as $n)
        <article class="card rounded-2xl border border-slate-700 overflow-hidden hover:scale-[1.02] hover:shadow-lg transition">
          {{-- คลิกรูปไปหน้าอ่านข่าว --}}
          <a href="{{ route('news.show', $n) }}">
            <img
              class="w-full aspect-video object-cover"
              src="{{ $n->image }}"
              onerror="this.src='https://picsum.photos/800/450?blur=2&random={{ $n->id }}'"
              alt="{{ $n->title }}"
            >
          </a>

          <div class="p-4">

          
            <div class="flex items-center justify-between mb-2">
                
              <span class="badge">{{ $n->category }}</span>
              {{-- คลิกหัวข้อไปหน้าอ่านข่าว --}}
            <h3 class="font-semibold leading-tight mb-1 text-lg">
              <a href="{{ route('news.show', $n) }}" class="hover:underline">
                {{ $n->title }}
              </a>
            </h3>
              <div class="flex gap-2">
                <button type="submit" class="btn"><a href="{{ route('news.edit',$n) }}" class="btn-warning">แก้ไข</a></button>
                <form method="post" action="{{ route('news.destroy',$n) }}" onsubmit="return confirm('ลบข่าวนี้หรือไม่?')">
                  @csrf @method('delete')
                  <button type="submit" class="btn">ลบ</button>
                </form>
              </div>
            </div>

            

            

            @if($n->link)
              <a class="inline-flex items-center gap-1 text-indigo-300 mt-2" target="_blank" href="{{ $n->link }}">
                อ่านต้นฉบับ ↗
              </a>
            @endif
          </div>
        </article>
      @endforeach
    </div>

    {{-- pagination (ใช้ไฟล์ custom ที่เราวางไว้ใน resources/views/vendor/pagination/tailwind.blade.php) --}}

    <div class="mt-6">{{ $news->onEachSide(1)->Links('pagination.buttons') }}</div>
  @else
    <div class="card rounded-2xl border border-slate-700 p-6 text-center">
      ยังไม่มีข่าวที่ตรงเงื่อนไข
    </div>
  @endif
</x-layouts.app>
