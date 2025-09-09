<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <title>{{ $title ?? 'News Portal' }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    :root{ --bg:#0f172a; --bg-2:#0b1223; --text:#eef2f7; --muted:#a8b3c5;
           --ring:#1f2937; --brand:#60a5fa; --card:#121a2b; }
    html{ font-size:15px } @media(min-width:1024px){ html{ font-size:16px } }
    *{ box-sizing:border-box }
    body{ margin:0; background:linear-gradient(180deg,var(--bg-2),var(--bg)); color:var(--text);
      font-family:"Noto Sans Thai","Sarabun","TH Sarabun New",system-ui,Segoe UI,Roboto,sans-serif;
      line-height:1.75; letter-spacing:.2px }
    a{ color:var(--brand); text-decoration:none } a:hover{ text-decoration:underline }
    .container{ max-width:1100px; margin:0 auto; padding:22px 16px 40px }
    header{ display:flex; justify-content:space-between; align-items:center; margin-bottom:14px }
    header h2{ margin:0; font-size:1.15rem; font-weight:700 }
    .btn{ display:inline-block; font-size:.95rem; padding:8px 12px; border:1px solid var(--ring);
          border-radius:12px; background:#0b1020; color:var(--text) }
    .grid{ display:grid; gap:16px; grid-template-columns:1fr }
    @media(min-width:640px){ .grid{ grid-template-columns:repeat(2,1fr) } }
    @media(min-width:960px){ .grid{ grid-template-columns:repeat(3,1fr) } }
    .card{ background:var(--card); border:1px solid #111827; border-radius:14px; overflow:hidden }
    .thumb{ width:100%; aspect-ratio:16/9; object-fit:cover; display:block }
    .body{ padding:12px 14px }
    .title{ color:#f1f5f9; font-weight:700; font-size:1.05rem; line-height:1.5;
            display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden }
    .meta{ color:var(--muted); font-size:.85rem; margin-top:6px }
    .summary{ color:#d9e2f1; margin-top:8px; line-height:1.85; font-size:.98rem;
              display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden }
    .flash{ margin-bottom:12px; padding:10px 12px; border-radius:10px; border:1px solid #1f2937; background:#0b1020 }
    /* pagination */
    .pagi{ margin-top:18px } .pagi p{ display:none!important }
    .pagi nav[aria-label="Pagination Navigation"]{ display:flex; justify-content:center; gap:10px; font-size:.95rem }
    .pagi nav[aria-label="Pagination Navigation"] a,.pagi nav[aria-label="Pagination Navigation"] span{
      display:inline-flex; align-items:center; justify-content:center; min-width:36px; height:36px; padding:0 12px;
      border-radius:999px; border:1px solid var(--ring); background:#0b1020; color:var(--text);
      transition:transform .12s ease, background .12s ease }
    .pagi nav[aria-label="Pagination Navigation"] a:hover{ background:#0f172a; transform:translateY(-1px) }
    .pagi [aria-current="page"], .pagi .active>span{ background:var(--brand)!important; color:#0b1020!important; border-color:transparent!important; font-weight:700 }
    .pagi svg{ width:14px; height:14px }
    img{ max-width:100%; height:auto }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h2>เว็บข่าวออนไลน์</h2>
      <div>
        <a class="btn" href="{{ route('news.create') }}">+ เพิ่มข่าว</a>
        <a class="btn" href="{{ route('news.index') }}">หน้าแรก</a>
      </div>
    </header>

    @if(session('success'))
      <div class="flash">{{ session('success') }}</div>
    @endif

    {{ $slot }}
  </div>
</body>
</html>