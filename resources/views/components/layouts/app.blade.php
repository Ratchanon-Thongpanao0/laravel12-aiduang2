<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <title>{{ $title ?? 'News Portal' }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    :root{
      --bg:#0f172a; --bg-2:#0b1223;
      --text:#eef2f7; /* สว่างขึ้นให้อ่านง่าย */
      --muted:#a8b3c5; /* สีอธิบาย/วันที่ */
      --ring:#1f2937; --brand:#60a5fa;
      --card:#121a2b;
    }

    /* ฟอนต์ฐาน: อ่านง่ายสำหรับภาษาไทย */
    html{ font: size 18px; } /* 15px พอดีตา */
    @media (min-width:1024px){ html{ font-size:18px; } }

    *{ box-sizing:border-box }
    body{
      margin:0;
      background:linear-gradient(180deg, var(--bg-2), var(--bg));
      color:var(--text);
      font-family: "Noto Sans Thai", "Sarabun", "TH Sarabun New",
                   system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
      font-weight: 400;
      line-height: 1.75; /* ระยะบรรทัดโปร่ง */
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      letter-spacing: .2px; /* เพิ่มระยะตัวอักษรนิดๆ */
      word-break: break-word; /* ตัดคำยาว */
    }

    a{ color:var(--brand); text-decoration:none }
    a:hover{ text-decoration:underline }

    .container{ max-width:1100px; margin:0 auto; padding:22px 16px 40px }

    header{
      display:flex; justify-content:space-between; align-items:center; margin-bottom:14px
    }
    header h2{
      margin:0; font-size:1.15rem; font-weight:700; letter-spacing:.3px
    }

    .btn{
      display:inline-block; font-size:.95rem;
      padding:8px 12px; border:1px solid var(--ring);
      border-radius:12px; background:#0b1020; color:var(--text);
      text-decoration:none;
    }

    /* ===== การ์ดข่าว ===== */
    .grid{ display:grid; gap:16px; grid-template-columns:1fr }
    @media(min-width:640px){ .grid{ grid-template-columns:repeat(2,1fr) } }
    @media(min-width:960px){ .grid{ grid-template-columns:repeat(3,1fr) } }

    .card{
      background: var(--card);
      border:1px solid #111827; border-radius:14px; overflow:hidden
    }
    .thumb{ width:100%; aspect-ratio:16/9; object-fit:cover; display:block }
    .body{ padding:12px 14px }

    .title{
      color:#f1f5f9; font-weight:700; font-size:1.05rem; /* ใหญ่กว่าตัวเนื้อหาเล็กน้อย */
      line-height:1.5;
      display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;
    }

    .meta{ color:var(--muted); font-size:.85rem; margin-top:6px }

    .summary{
      color:#d9e2f1; margin-top:8px;
      line-height:1.85; font-size:.98rem; /* ใหญ่กว่าก่อนหน้าเล็กน้อย */
      display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;
    }

    /* ===== เนื้อหาในหน้ารายละเอียด ===== */
    .hero{
      width:100%; aspect-ratio:16/7; object-fit:cover;
      border-radius:14px; border:1px solid #111827; margin:8px 0 12px;
    }
    .prose{
      white-space:pre-wrap; line-height:1.95; color:#e8f0fb; font-size:1rem;
    }

    /* ===== Pagination – เรียบ อ่านง่าย ===== */
    .pagi{ margin-top:18px }
    .pagi p{ display:none !important; } /* ซ่อน “Showing … results” */

    .pagi nav[aria-label="Pagination Navigation"]{
      display:flex; justify-content:center; gap:10px; font-size:.95rem;
    }
    .pagi nav[aria-label="Pagination Navigation"] a,
    .pagi nav[aria-label="Pagination Navigation"] span{
      display:inline-flex; align-items:center; justify-content:center;
      min-width:36px; height:36px; padding:0 12px;
      border-radius:999px; border:1px solid var(--ring);
      background:#0b1020; color:var(--text);
      text-decoration:none;
      transition:transform .12s ease, background .12s ease, border-color .12s ease;
    }
    .pagi nav[aria-label="Pagination Navigation"] a:hover{
      background:#0f172a; transform:translateY(-1px);
    }
    .pagi nav[aria-label="Pagination Navigation"] .active>span,
    .pagi nav[aria-label="Pagination Navigation"] span[aria-current="page"]{
      background:var(--brand); color:#0b1020; border-color:transparent; font-weight:700;
    }
    .pagi nav[aria-label="Pagination Navigation"] svg{ width:14px; height:14px; }

    /* กันรูปหลุดขนาดใหญ่ */
    img{ max-width:100%; height:auto; }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h2>เว็บข่าวออนไลน์</h2>
      <a class="btn" href="{{ url('/') }}">หน้าแรก</a>
    </header>

    {{ $slot }}
  </div>
</body>
</html>