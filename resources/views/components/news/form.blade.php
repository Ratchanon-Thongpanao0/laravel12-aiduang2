@props(['news' => null, 'categories' => collect()])

<div class="space-y-5">
  <div>
    <label class="block text-sm font-medium mb-1">หัวข้อข่าว *</label>
    <input type="text" name="title" value="{{ old('title', $news->title ?? '') }}"
           class="w-full rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 focus:ring-2 focus:ring-indigo-400">
    @error('title')<div class="text-pink-300 text-sm">{{ $message }}</div>@enderror
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-medium mb-1">หมวด *</label>
      <input type="text" name="category" list="catlist"
             value="{{ old('category', $news->category ?? '') }}"
             class="w-full rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 focus:ring-2 focus:ring-indigo-400">
      <datalist id="catlist">
        @foreach($categories as $c) <option value="{{ $c }}"> @endforeach
      </datalist>
      @error('category')<div class="text-pink-300 text-sm">{{ $message }}</div>@enderror
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">วันเผยแพร่</label>
      <input type="datetime-local" name="published_at"
             value="{{ old('published_at', optional($news?->published_at)->format('Y-m-d\TH:i')) }}"
             class="w-full rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 focus:ring-2 focus:ring-indigo-400">
      @error('published_at')<div class="text-pink-300 text-sm">{{ $message }}</div>@enderror
    </div>
  </div>

  

  <div>
    <label class="block text-sm font-medium mb-1">เนื้อหา</label>
    <textarea name="body" rows="6"
              class="w-full rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 focus:ring-2 focus:ring-indigo-400">{{ old('body', $news->body ?? '') }}</textarea>
    @error('body')<div class="text-pink-300 text-sm">{{ $message }}</div>@enderror
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-medium mb-1">ลิงก์ต้นฉบับ</label>
      <input type="url" name="link" value="{{ old('link', $news->link ?? '') }}"
             class="w-full rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 focus:ring-2 focus:ring-indigo-400">
      @error('link')<div class="text-pink-300 text-sm">{{ $message }}</div>@enderror
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">รูปภาพ (URL)</label>
      <input type="url" name="image" value="{{ old('image', $news->image ?? '') }}"
             class="w-full rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 focus:ring-2 focus:ring-indigo-400">
      @error('image')<div class="text-pink-300 text-sm">{{ $message }}</div>@enderror
    </div>
  </div>

  
</div>