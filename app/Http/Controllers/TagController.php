<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(?string $slug = null)
    {
        $tags = Tag::query()
            ->where('type', 1)
            ->where('is_publish', 1)
            ->get();

        if ($slug) {
            $tag = Tag::query()
                ->where('slug', $slug)
                ->where('type', 1)
                ->where('is_publish', 1)
                ->with(['products'])
                ->first();

            return view('tags.show', [
                'tag' => $tag,
                'tags' => $tags,
            ]);
        }

        return view('tags.index', [
            'tags' => $tags
        ]);
    }
}
