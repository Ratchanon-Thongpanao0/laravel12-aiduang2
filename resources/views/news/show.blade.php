<x-layouts.app :title="$news->title">
  <article class="mx-auto max-w-3xl card rounded-2xl border border-slate-700 p-6">
    {{-- รูปภาพ --}}
    <img class="w-full aspect-video object-cover rounded-lg mb-4"
         src="{{ $news->image }}"
         onerror="this.src='https://picsum.photos/800/450?blur=2&random={{ $news->id }}'">

    {{-- หมวด + วันเวลา --}}
    <div class="flex items-center justify-between mb-2 text-sm text-slate-400">
      <span class="badge">{{ $news->category }}</span>
      @if($news->published_at)
        <time>{{ $news->published_at->format('d/m/Y H:i') }}</time>
      @endif
    </div>

    {{-- หัวข้อ --}}
    <h1 class="text-2xl font-bold mb-2">{{ $news->title }}</h1>

    {{-- คำโปรย --}}
    @if($news->subtitle)
      <p class="text-lg text-slate-300 mb-4">{{ $news->subtitle }}</p>
    @endif

    {{-- เนื้อหา --}}
    <div class="prose prose-invert max-w-none">
      {!! nl2br(e($news->body)) !!}
    </div>

    {{-- ลิงก์ต้นฉบับ --}}
    @if($news->link)
      <div class="mt-6">
        <a href="{{ $news->link }}" target="_blank" class="btn">อ่านจากแหล่งข่าวต้นฉบับ</a>
      </div>
    @endif

    {{-- ปุ่มย้อนกลับ --}}
    <div class="mt-6">
      <button type="submit" class="btn"><a href="{{ route('news.index') }}" class="btn-ghost">← กลับไปหน้ารายการข่าว</a></button>
    </div>
  </article>
</x-layouts.app>