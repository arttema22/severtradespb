<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(?string $slug = null)
    {
        if ($slug) {
            $page = Page::query()
                ->where('slug', $slug)
                ->where('is_publish', 1)
                ->first();

            return view('pages.show', [
                'page' => $page,
            ]);
        }

        return view('pages.index', []);
    }
}
