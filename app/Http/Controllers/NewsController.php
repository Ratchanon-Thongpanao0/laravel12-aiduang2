<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // แสดงรายการข่าวแบบแบ่งหน้า
        $news = News::orderByDesc('published_at')->paginate(9);
        return view('news.index', compact('news'));
    }

    // <- ตัวนี้สำคัญ! ให้ชื่อเมธอดตรงกับ route
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }
}