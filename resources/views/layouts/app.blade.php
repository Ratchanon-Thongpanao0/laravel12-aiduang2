<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <title>{{ $title ?? 'News Admin' }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  {{-- Tailwind CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body{background:linear-gradient(135deg,#0b1022,#0a1328); color:#e5e7eb}
    .card{background:radial-gradient(1200px 420px at 10% -60%, #1c1d3a 0%, transparent 40%), #0b1126}
  </style>

  {{-- ปุ่ม/แบดจ์ reusable classes --}}
  <style>
    .btn{
      @apply inline-flex items-center gap-2 px-4 py-2 rounded-xl border text-sm font-semibold transition
             border-violet-500/40 bg-violet-600/30 hover:bg-violet-600/40 hover:shadow-lg;
    }
    .btn-ghost{
      @apply inline-flex items-center gap-2 px-4 py-2 rounded-xl border text-sm font-semibold transition
             border-slate-600/50 bg-slate-700/30 hover:bg-slate-700/40;
    }
    .btn-danger{
      @apply inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-sm font-medium
             border border-rose-500/40 bg-rose-600/80 text-white hover:bg-rose-600 transition;
    }
    .btn-warning{
      @apply inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-sm font-medium
             bg-amber-500/80 text-white hover:bg-amber-500 transition;
    }
    .badge{ @apply text-xs px-2 py-1 rounded-full border border-indigo-400/40 bg-indigo-500/20; }
    .wrap{ @apply max-w-6xl mx-auto px-4; }
  </style>
</head>
<body class="min-h-screen">
  <div class="wrap">
    {{-- Header --}}
    <header class="sticky top-3 z-10 mb-4">
      <div class="card rounded-2xl border border-slate-700/80 px-4 py-3 flex items-center justify-between backdrop-blur">
        <a href="{{ route('news.index') }}" class="text-xl md:text-2xl font-bold bg-gradient-to-r from-violet-400 to-cyan-300 bg-clip-text text-transparent">
          News Admin
        </a>
        <nav class="flex gap-2">
          <a href="{{ route('news.index') }}" class="btn-ghost">รายการข่าว</a>
          <a href="{{ route('news.create') }}" class="btn">➕ เพิ่มข่าว</a>
        </nav>
      </div>
    </header>

    {{-- Flash message --}}
    @if (session('ok'))
      <div class="mb-4 rounded-xl border border-emerald-500/40 bg-emerald-600/20 px-4 py-2 text-emerald-100">
        {{ session('ok') }}
      </div>
    @endif

    {{-- Page content --}}
    <main class="pb-10">
      {{ $slot }}
    </main>
  </div>
</body>
</html>