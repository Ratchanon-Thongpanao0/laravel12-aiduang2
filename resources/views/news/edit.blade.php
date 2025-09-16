<x-layouts.app :title="'แก้ไขข่าว'">
  <div class="mx-auto max-w-3xl">
    <form method="post" action="{{ route('news.update',$news) }}" class="card rounded-2xl border border-slate-700 p-6">
      @csrf @method('put')
      <h2 class="text-xl font-semibold mb-4">แก้ไขข่าว</h2>
      <x-news.form :news="$news" :categories="$categories" />
      <div class="mt-6 flex justify-end gap-3">
        <button type="submit" class="btn"><a href="{{ route('news.index') }}" class="btn-ghost">ยกเลิก</a></button>
        <button type="submit" class="btn">อัปเดต</button>
      </div>
    </form>
  </div>
</x-layouts.app>