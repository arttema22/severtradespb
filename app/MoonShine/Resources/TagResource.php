<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Tag;
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
use MoonShine\Enums\ClickAction;
use MoonShine\Decorations\Column;
use MoonShine\Fields\StackFields;
use MoonShine\QueryTags\QueryTag;
use Illuminate\Support\Facades\Auth;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Relationships\BelongsToMany;

class TagResource extends ModelResource
{
    protected string $model = Tag::class;

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    public string $column = 'name';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    protected int $itemsPerPage = 25; // Количество элементов на странице

    public function title(): string
    {
        return __('product.tags');
    }

    /*
    * Основной запрос
    */
    public function query(): Builder
    {
        return parent::query()->where('type', 1);
    }

    public function indexFields(): array
    {
        return [
            Position::make(),
            Image::make('thumbnail')->dir('products')->translatable('product'),
            StackFields::make('title')->fields([
                Text::make('name')->updateOnPreview()->translatable('product'),
                Slug::make('slug')->translatable('product'),
            ])->translatable('product'),
            BelongsToMany::make('in_product', 'products', resource: new ProductResource)
                ->onlyCount()
                ->translatable('product'),
            Switcher::make('publish', 'is_publish')->updateOnPreview()->translatable('product')->sortable(),
        ];
    }

    public function formFields(): array
    {
        return [
            Hidden::make('user_id')->fill(Auth()->id()),
            Hidden::make('type')->fill('1'),
            Grid::make([
                Column::make([
                    Block::make([
                        Text::make('name')->required()->translatable('product'),
                        Slug::make('slug')->from('name')->unique()->translatable('product'),
                        Textarea::make('description')->translatable('product'),
                        Switcher::make('publish', 'is_publish')->translatable('product'),
                    ]),
                ])->columnSpan(6),
                Column::make([
                    Textarea::make('meta_description')->translatable('product'),
                    Text::make('meta_keywords')->translatable('product'),
                    Image::make('thumbnail')->dir('products')->removable()->translatable('product'),
                ])->columnSpan(6),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => ['required'],
            'slug' => ['nullable'],
            'description' => ['nullable'],
            'thumbnail' => ['nullable', 'dimensions:min_width=100,min_height=200'],
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
        return to_page(resource: TagResource::class);
    }

    /*
    * перенаправление после удаления
    */
    public function redirectAfterDelete(): string
    {
        return to_page(resource: TagResource::class);
    }

    /*
    * разрешенные действия
    */
    public function getActiveActions(): array
    {
        return ['create', 'update', 'delete', 'massDelete'];
    }

    /*
    * Поиск по полям
    */
    public function search(): array
    {
        return ['name'];
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
            ActionButton::make('To site', fn (Tag $data) => route('tags.index', $data->slug))->blank(),
        ];
    }
}
