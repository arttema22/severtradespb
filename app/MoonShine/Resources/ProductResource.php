<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use MoonShine\Fields\ID;
use MoonShine\Fields\Date;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Hidden;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Position;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
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

    // protected bool $createInModal = true;

    // protected bool $editInModal = true;

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
                Text::make('name')->translatable('product'),
                Slug::make('slug')->translatable('product'),
            ])->translatable('product'),
            Text::make('size')->sortable()->translatable('product'),
            Text::make('mark')->sortable()->translatable('product'),
            Text::make('length')->sortable()->translatable('product'),
            Switcher::make('publish', 'is_publish')->updateOnPreview()->translatable('product')->sortable(),
            BelongsToMany::make('categories', 'categories', resource: new CategoryResource)
                ->inLine(separator: ' ', badge: true)
                ->creatable()
                ->translatable('product'),
            BelongsToMany::make('tags', 'tags', resource: new TagResource)
                ->inLine(separator: ' ', badge: true)
                ->creatable()
                ->translatable('product'),
        ];
    }

    public function formFields(): array
    {
        return [
            Hidden::make('user_id')->fill(Auth()->id()),
            Grid::make([
                Column::make([
                    Block::make([
                        Text::make('name')->required()->translatable('product'),
                        Slug::make('slug')->from('name')->unique()->translatable('product'),
                        TinyMce::make('description')->translatable('product'),
                        Text::make('characteristics')->translatable('product'),
                        Grid::make([
                            Column::make([
                                Text::make('size')->translatable('product'),
                            ])->columnSpan(4),
                            Column::make([
                                Text::make('mark')->translatable('product'),
                            ])->columnSpan(4),
                            Column::make([
                                Text::make('length')->translatable('product'),
                            ])->columnSpan(4),
                        ]),
                        Switcher::make('publish', 'is_publish')->translatable('product'),
                    ]),
                ])->columnSpan(8),
                Column::make([
                    Textarea::make('meta_description')->translatable('product'),
                    Text::make('meta_keywords')->translatable('product'),
                    Image::make('thumbnail')->dir('products')->removable()->translatable('product'),

                    BelongsToMany::make('categories', 'categories', resource: new CategoryResource)
                        ->creatable()
                        //->tree('category_id')
                        ->selectMode()
                        ->translatable('product'),
                    BelongsToMany::make('tags', 'tags', resource: new TagResource)
                        ->creatable()
                        ->selectMode()
                        ->translatable('product'),
                ])->columnSpan(4),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => ['required'],
            'slug' => ['nullable'],
            'description' => ['nullable'],
            'size' => ['nullable'],
            'mark' => ['nullable'],
            'length' => ['nullable'],
            'thumbnail' => ['nullable', 'dimensions:min_width=100,min_height=200'],
            'characteristics' => ['nullable'],
            'is_publish' => ['required'],
            'meta_description' => ['nullable'],
            'meta_keywords' => ['nullable'],
        ];
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
            Text::make('size')->translatable('product'),
            Text::make('mark')->sortable()->translatable('product'),
            Text::make('length')->sortable()->translatable('product'),
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
