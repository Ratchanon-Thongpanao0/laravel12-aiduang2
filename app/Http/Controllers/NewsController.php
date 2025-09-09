<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderByDesc('published_at')->paginate(9);
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:100',
            'summary' => 'required',
            'content' => 'required',
            'image_url' => 'required|url',
            'source_url' => 'nullable|url',
            'published_at' => 'required|date',
        ]);

        // สร้าง slug ไม่ซ้ำ
        $base = Str::slug($data['title'], '-');
        $slug = $base;
        $i = 1;
        while (News::where('slug', $slug)->exists()) $slug = $base . '-' . $i++;
        $data['slug'] = $slug;

        News::create($data);
        return redirect()->route('news.index')->with('success', 'เพิ่มข่าวเรียบร้อย');
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:100',
            'summary' => 'required',
            'content' => 'required',
            'image_url' => 'required|url',
            'source_url' => 'nullable|url',
            'published_at' => 'required|date',
        ]);

        if ($news->title !== $data['title']) {
            $base = Str::slug($data['title'], '-');
            $slug = $base;
            $i = 1;
            while (News::where('slug', $slug)->where('id', '!=', $news->id)->exists()) $slug = $base . '-' . $i++;
            $data['slug'] = $slug;
        }

        $news->update($data);
        return redirect()->route('news.index')->with('success', 'แก้ไขข่าวเรียบร้อย');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'ลบข่าวเรียบร้อย');
    }
    public function show(\App\Models\News $news)
    {
        return view('news.show', compact('news'));
    }
}
