<x-layouts.app :title="'เพิ่มข่าวใหม่'">
  <h1 style="margin:0 0 10px; font-size:1.3rem">เพิ่มข่าวใหม่</h1>
  <form method="POST" action="{{ route('news.store') }}">
    @csrf
    @include('news._form')
  </form>
</x-layouts.app>