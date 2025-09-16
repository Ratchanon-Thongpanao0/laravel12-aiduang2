<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // GET /news
    public function index(Request $request)
    {
        $q = $request->get('q');
        $cat = $request->get('category');

        $news = News::query()
            ->when($cat, fn($w) => $w->where('category', $cat))
            ->when($q, function ($w) use ($q) {
                $w->where(function ($x) use ($q) {
                    $x->where('title', 'like', "%$q%")
                        ->orWhere('subtitle', 'like', "%$q%")
                        ->orWhere('body', 'like', "%$q%");
                });
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $categories = News::query()->select('category')->distinct()->orderBy('category')->pluck('category');

        return view('news.index', compact('news', 'categories', 'q', 'cat'));
    }

    // GET /news/create
    public function create()
    {
        $categories = News::query()->select('category')->distinct()->orderBy('category')->pluck('category');
        return view('news.create', compact('categories'));
    }

    // POST /news
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:50'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'link' => ['nullable', 'url', 'max:2048'],
            'image' => ['nullable', 'url', 'max:2048'],
            'published_at' => ['nullable', 'date'],
        ]);

        News::create($data);
        return redirect()->route('news.index')->with('ok', 'บันทึกข่าวแล้ว');
    }

    // GET /news/{news}/edit
    public function edit(News $news)
    {
        $categories = News::query()->select('category')->distinct()->orderBy('category')->pluck('category');
        return view('news.edit', compact('news', 'categories'));
    }

    // PUT/PATCH /news/{news}
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:50'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'link' => ['nullable', 'url', 'max:2048'],
            'image' => ['nullable', 'url', 'max:2048'],
            'published_at' => ['nullable', 'date'],
        ]);

        $news->update($data);
        return redirect()->route('news.index')->with('ok', 'แก้ไขข่าวแล้ว');
    }

    // DELETE /news/{news}
    public function destroy(News $news)
    {
        $news->delete();
        return back()->with('ok', 'ลบข่าวแล้ว');
    }

    public function show(\App\Models\News $news)
    {
        return view('news.show', compact('news'));
    }
}
