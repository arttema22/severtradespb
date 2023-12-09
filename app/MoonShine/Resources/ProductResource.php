<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use MoonShine\Fields\ID;
use MoonShine\Fields\Date;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Position;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\StackFields;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Relationships\BelongsToMany;


class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    public string $column = 'title';

    protected bool $isAsync = true;

    public function title(): string
    {
        return __('product.products');
    }

    public function indexFields(): array
    {
        return [
            Position::make(),
            Image::make('thumbnail')->dir('products')->translatable('product'),
            StackFields::make('title')->fields([
                Text::make('title')->translatable('product'),
                Slug::make('slug')->translatable('product'),
            ])->translatable('product'),
            Text::make('size')->sortable()->translatable('product'),
            Text::make('mark')->sortable()->translatable('product'),
            Text::make('length')->sortable()->translatable('product'),
            Switcher::make('publish', 'is_publish')->translatable('product')->sortable(),
            BelongsToMany::make('categories', 'categories', resource: new CategoryResource)
                ->inLine(separator: ' ', badge: true)
                ->translatable('product'),
            BelongsToMany::make('tags', 'tags', resource: new TagResource)
                ->inLine(separator: ' ', badge: true)
                ->translatable('product'),
        ];
    }

    public function formFields(): array
    {
        return [
            ID::make(),
            Text::make('user_id'),
            Text::make('title'),
            Slug::make('slug')
                ->from('title')
                ->unique(),
            TinyMce::make('description'),
            Text::make('size'),
            Text::make('mark'),
            Text::make('length'),
            Image::make('thumbnail')->dir('products')->translatable('product'),
            Text::make('characteristics'),
            Textarea::make('meta_description'),
            Text::make('meta_keywords'),
            Switcher::make('publish', 'is_publish')->translatable('product'),
            Date::make('created_at'),
            Date::make('updated_at'),
            Date::make('deleted_at'),
            BelongsToMany::make('categories', 'categories', resource: new CategoryResource)
                ->creatable()
                //->tree('parent_id')
                ->translatable('product'),
            BelongsToMany::make('tags', 'tags', resource: new TagResource)
                ->creatable()
                ->selectMode()
                ->translatable('product'),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    /*
    * перенаправление после сохранения
    */
    public function redirectAfterSave(): string
    {
        return to_page(resource: ProductResource::class);
    }

    /*
    * перенаправление после удаления
    */
    public function redirectAfterDelete(): string
    {
        return to_page(resource: ProductResource::class);
    }

    /*
    * разрешенные действия
    */
    public function getActiveActions(): array
    {
        return ['create', 'update', 'delete', 'massDelete'];
    }

    /*
    * Фильтры
    */
    public function filters(): array
    {
        return [
            Text::make('size'),
            Text::make('mark')->sortable(),
            Text::make('length')->sortable(),
        ];
    }

    /*
    * Поиск по полям
    */
    public function search(): array
    {
        return ['title', 'size', 'mark', 'length'];
    }

    /*
    * Быстрые фильтры
    */
    public function queryTags(): array
    {
        return [
            QueryTag::make(
                'all',
                fn (Builder $query) => $query
            )->translatable('product')->default(),

            QueryTag::make(
                'publish',
                fn (Builder $query) => $query->where('is_publish', '1')
            )->translatable('product'),

            QueryTag::make(
                'not_publish',
                fn (Builder $query) => $query->where('is_publish', '0')
            )->translatable('product'),
        ];
    }

    /*
    * Кнопка перехода на страницу сайта
    */
    public function buttons(): array
    {
        return [
            ActionButton::make('To site', fn (Product $data) => route('products.index', $data->slug))->blank(),
        ];
    }
}
