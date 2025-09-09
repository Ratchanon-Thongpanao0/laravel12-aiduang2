<x-layouts.app :title="'แก้ไขข่าว: '.($news->title ?? '')">
  <h1 style="margin:0 0 10px; font-size:1.3rem">แก้ไขข่าว</h1>
  <form method="POST" action="{{ route('news.update', $news) }}">
    @csrf @method('PUT')
    @include('news._form', ['news' => $news])
  </form>
</x-layouts.app>