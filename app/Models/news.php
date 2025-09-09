<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title','slug','category','summary','content',
        'image_url','source_url','published_at',
    ];

    protected $casts = ['published_at' => 'datetime'];

    // ใช้ slug เป็น key ใน URL
    public function getRouteKeyName(): string { return 'slug'; }
}