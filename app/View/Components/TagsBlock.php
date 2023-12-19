<?php

namespace App\View\Components;

use Closure;
use App\Models\Tag;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TagsBlock extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tags = Tag::where('type', 1)
            ->where('is_publish', 1)
            ->get();

        return view('components.tags-block', [
            'tags' => $tags,
        ]);
    }
}
