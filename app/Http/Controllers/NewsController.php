<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * แสดงรายการข่าวทั้งหมด
     */
    public function index()
    {
        $news = News::latest()->paginate(9); // แสดง 9 ข่าวต่อหน้า
        return view('news.index', compact('news'));
    }

    /**
     * แสดงฟอร์มสร้างข่าวใหม่
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * บันทึกข่าวใหม่ลง DB
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $news = News::create($data);

        return redirect()->route('news.show', $news->id)
                         ->with('success', 'เพิ่มข่าวเรียบร้อยแล้ว');
    }

    /**
     * แสดงข่าวเดียว (หน้าอ่านต่อ)
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * แสดงฟอร์มแก้ไขข่าว
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * อัปเดตข่าว
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $news->update($data);

        return redirect()->route('news.show', $news->id)
                         ->with('success', 'แก้ไขข่าวเรียบร้อยแล้ว');
    }

    /**
     * ลบข่าว
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index')
                         ->with('success', 'ลบข่าวเรียบร้อยแล้ว');
    }
}