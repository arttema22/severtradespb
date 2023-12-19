@if (count($tags) > 0)
@foreach ($tags as $tag)
<a href="{{route('tags.index', $tag->slug)}}">
    <span
        class="inline-flex items-center gap-x-1.5 mb-1 py-1.5 px-3 rounded-md text-xs font-medium border border-gray-200 bg-white text-gray-800 shadow-sm dark:bg-slate-900 dark:border-gray-700 dark:text-white hover:bg-gray-200">
        {{ $tag->name }}
    </span>
</a>
@endforeach
@endif