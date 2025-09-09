@php $editing = isset($news); @endphp

<div style="display:grid; gap:12px">
  <div>
    <label>หัวข้อข่าว *</label><br>
    <input class="btn" style="width:100%" type="text" name="title" value="{{ old('title', $news->title ?? '') }}">
    @error('title') <div class="flash">{{ $message }}</div> @enderror
  </div>

  <div>
    <label>หมวดหมู่ *</label><br>
    <input class="btn" style="width:100%" type="text" name="category" value="{{ old('category', $news->category ?? '') }}">
    @error('category') <div class="flash">{{ $message }}</div> @enderror
  </div>

  <div>
    <label>สรุปข่าว (สั้น) *</label><br>
    <textarea class="btn" style="width:100%; height:90px" name="summary">{{ old('summary', $news->summary ?? '') }}</textarea>
    @error('summary') <div class="flash">{{ $message }}</div> @enderror
  </div>

  <div>
    <label>เนื้อหาข่าว (ยาว) *</label><br>
    <textarea class="btn" style="width:100%; height:200px" name="content">{{ old('content', $news->content ?? '') }}</textarea>
    @error('content') <div class="flash">{{ $message }}</div> @enderror
  </div>

  <div>
    <label>ลิงก์รูปภาพ (Image URL) *</label><br>
    <input class="btn" style="width:100%" type="url" name="image_url" value="{{ old('image_url', $news->image_url ?? '') }}">
    @error('image_url') <div class="flash">{{ $message }}</div> @enderror
  </div>

  <div>
    <label>ลิงก์แหล่งข่าว (Source URL)</label><br>
    <input class="btn" style="width:100%" type="url" name="source_url" value="{{ old('source_url', $news->source_url ?? '') }}">
    @error('source_url') <div class="flash">{{ $message }}</div> @enderror
  </div>

  <div>
    <label>วันที่เผยแพร่ *</label><br>
    <input class="btn" style="width:100%" type="datetime-local" name="published_at"
      value="{{ old('published_at', isset($news->published_at) ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
    @error('published_at') <div class="flash">{{ $message }}</div> @enderror
  </div>
</div>

<div style="margin-top:12px; display:flex; gap:10px; flex-wrap:wrap">
  <button class="btn" type="submit">{{ $editing ? 'บันทึกการแก้ไข' : 'บันทึกข่าว' }}</button>
  <a class="btn" href="{{ route('news.index') }}">ยกเลิก</a>
</div>
