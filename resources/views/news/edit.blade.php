<x-layouts.app :title="'แก้ไขข่าว'">
  <h1 style="font-size: 1.5rem; margin-bottom:15px;">แก้ไขข่าว</h1>

  <form action="{{ route('news.update', ['news' => $news->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div style="margin-bottom:10px;">
      <label>หัวข้อข่าว:</label><br>
      <input type="text" name="title" value="{{ old('title', $news->title) }}" style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:10px;">
      <label>หมวดหมู่:</label><br>
      <input type="text" name="category" value="{{ old('category', $news->category) }}" style="width:100%; padding:8px;">
    </div>

    <div style="margin-bottom:10px;">
      <label>สรุป:</label><br>
      <textarea name="summary" rows="3" style="width:100%; padding:8px;">{{ old('summary', $news->summary) }}</textarea>
    </div>

    <div style="margin-bottom:10px;">
      <label>เนื้อหา:</label><br>
      <textarea name="content" rows="6" style="width:100%; padding:8px;">{{ old('content', $news->content) }}</textarea>
    </div>

    <div style="margin-bottom:10px;">
      <label>ลิงก์ภาพ:</label><br>
      <input type="text" name="image_url" value="{{ old('image_url', $news->image_url) }}" style="width:100%; padding:8px;">
    </div>

    <button type="submit" class="btn">บันทึกการแก้ไข</button>
    <a href="{{ route('news.index') }}" class="btn">ยกเลิก</a>
  </form>
</x-layouts.app>