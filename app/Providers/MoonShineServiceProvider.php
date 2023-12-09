<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\TagResource;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make('products', [
                MenuItem::make('products', new ProductResource)->icon('heroicons.outline.square-3-stack-3d')->translatable('product')
                    ->badge(fn () => strval(Product::query()->count())),
                MenuItem::make('categories', new CategoryResource)->icon('heroicons.outline.queue-list')->translatable('product')
                    ->badge(fn () => strval(Category::query()->count())),
                MenuItem::make('tags', new TagResource)->icon('heroicons.outline.tag')->translatable('product')
                    ->badge(fn () => strval(Tag::query()->count())),
            ])->icon('heroicons.square-3-stack-3d')->translatable('product')
                ->canSee(fn () => request()->routeIs('moonshine.*')),

            MenuGroup::make(static fn () => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn () => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ])->canSee(fn () => request()->routeIs('moonshine.*')),

            MenuItem::make('Documentation', 'https://moonshine-laravel.com')
                ->badge(fn () => 'Check')->canSee(fn () => request()->routeIs('moonshine.*')),

            MenuItem::make('catalog', fn () => route('categories.index'))
                ->icon('heroicons.outline.square-3-stack-3d')
                ->translatable('product')
                ->canSee(fn () => !request()->routeIs('moonshine.*')),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [
            'colors' => [
                //'body' => '#3f4e5d',
                'primary' => '#FF680A',
                'secondary' => '#3f4e5d',
            ],
        ];
    }
}
