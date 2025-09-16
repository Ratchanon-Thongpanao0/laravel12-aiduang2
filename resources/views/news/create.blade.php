<x-layouts.app :title="'เพิ่มข่าว'">
  <div class="mx-auto max-w-3xl">
    <form method="post" action="{{ route('news.store') }}" class="card rounded-2xl border border-slate-700 p-6">
      @csrf
      <h2 class="text-xl font-semibold mb-4">เพิ่มข่าว</h2>
      <x-news.form :categories="$categories" />
      <div class="mt-6 flex justify-end gap-3">
        <a href="{{ route('news.index') }}" class="btn-ghost">ยกเลิก</a>
        <button type="submit" class="btn">บันทึก</button>
      </div>
    </form>
  </div>
</x-layouts.app>