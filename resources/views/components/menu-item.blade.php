@if($menuItem->children->count())
<div class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none] sm:[--trigger:hover] sm:py-4">
    <button type="button"
        class="flex items-center w-full text-gray-500 hover:text-gray-400 font-medium dark:text-gray-400 dark:hover:text-gray-500 ">
        {{ $menuItem->title }}
        <svg class="ms-2 w-2.5 h-2.5 text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor"
                stroke-width="2" stroke-linecap="round"></path>
        </svg>
    </button>

    <div
        class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 hidden z-10 bg-white sm:shadow-md rounded-lg p-2 dark:bg-gray-800 sm:dark:border dark:border-gray-700 dark:divide-gray-700 before:absolute top-full sm:border before:-top-5 before:start-0 before:w-full before:h-5">
        @foreach($menuItem->children as $child)
        <x-menu-item :menuItem="$child" />
        @endforeach
    </div>
</div>
@else
<a class="font-medium text-gray-500 hover:text-gray-400 sm:py-6 dark:text-gray-400 dark:hover:text-gray-500"
    href="{{ $menuItem->url }}" aria-current="page">
    {{ $menuItem->title }}
</a>
@endif