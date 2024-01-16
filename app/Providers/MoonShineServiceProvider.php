<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use App\Models\Catalog\Product;
use App\Models\Catalog\ProductOption;
use App\MoonShine\Resources\TagResource;
use App\MoonShine\Resources\MenuResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\Catalog\ProductResource;
use App\MoonShine\Resources\Catalog\ProductOptionResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use App\MoonShine\Resources\Catalog\ProductattributeResource;
use App\MoonShine\Resources\Catalog\ProductOptionValueResource;
use App\MoonShine\Resources\Catalog\ProductattributevalueResource;
use App\MoonShine\Resources\Site\SliderResource;

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
            MenuGroup::make('catalog', [
                MenuItem::make('products', new ProductResource)->icon('heroicons.outline.square-3-stack-3d')
                    ->translatable('catalog')
                    ->badge(fn () => strval(Product::query()->count())),
                MenuItem::make('categories', new CategoryResource)->icon('heroicons.outline.queue-list')
                    ->translatable('catalog')
                    ->badge(fn () => strval(Category::query()->where('type', 1)->count())),
                MenuItem::make('tags', new TagResource)->icon('heroicons.outline.tag')
                    ->translatable('catalog')
                    ->badge(fn () => strval(Tag::query()->where('type', 1)->count())),
                MenuItem::make('options', new ProductOptionResource)->icon('heroicons.outline.tag')
                    ->translatable('catalog')
                    ->badge(fn () => strval(ProductOption::query()->count())),
                MenuItem::make('option values', new ProductOptionValueResource)->icon('heroicons.outline.tag')
                    ->translatable('catalog'),
            ])->icon('heroicons.square-3-stack-3d')->translatable('catalog'),
            // ->canSee(fn () => request()->routeIs('moonshine.*')),

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

            MenuItem::make('pages', new PageResource)->icon('heroicons.outline.document-text')
                ->translatable('page')
                //->badge(fn () => strval(Page::query()->count()))
                ->canSee(fn () => request()->routeIs('moonshine.*')),

            MenuItem::make('contact', 'http://localhost:8000/contact')
                ->translatable('page')
                ->canSee(fn () => !request()->routeIs('moonshine.*')),

            MenuItem::make('menu', new MenuResource)->icon('heroicons.outline.bars-3')->translatable('site'),

            MenuItem::make('attributes', new ProductAttributeResource)->icon('heroicons.outline.bars-3')->translatable('site'),
            MenuItem::make('values', new ProductattributevalueResource)->icon('heroicons.outline.bars-3')->translatable('site'),

            MenuItem::make('slider', new SliderResource)->icon('heroicons.outline.photo')->translatable('site'),

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
