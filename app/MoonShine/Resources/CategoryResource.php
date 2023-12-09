<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use App\Models\Product;
use MoonShine\Fields\ID;
use MoonShine\Fields\Date;

use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Position;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Column;
use MoonShine\Fields\StackFields;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Pages\CategoryTreePage;
use Illuminate\Database\Eloquent\Builder;
use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;

class CategoryResource extends TreeResource
{
    protected string $model = Category::class;

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    public string $column = 'name';

    protected string $sortColumn = 'sorting';

    protected int $itemsPerPage = 50; // Количество элементов на странице

    public function title(): string
    {
        return __('product.categories');
    }

    protected function pages(): array
    {
        return [
            CategoryTreePage::make($this->title()),
            FormPage::make(
                $this->getItemID()
                    ? __('moonshine::ui.edit')
                    : __('moonshine::ui.add')
            ),
            DetailPage::make(__('moonshine::ui.show')),
        ];
    }

    // public function fields(): array
    // {
    //     return [
    //         Position::make(),
    //         ID::make()->showOnExport(),
    //         Text::make('user_id')->showOnExport(),
    //         Text::make('type')->showOnExport(),
    //         Image::make('thumbnail')->dir('products')->translatable('product')->showOnExport(),
    //         StackFields::make('title')->fields([
    //             Text::make('name')->updateOnPreview()->showOnExport(),
    //             Slug::make('slug')->showOnExport(),
    //         ])->translatable('product'),
    //         TinyMce::make('description'),
    //         Textarea::make('meta_description'),
    //         Text::make('meta_keywords'),
    //         BelongsTo::make('parent', 'category', resource: new CategoryResource())
    //             ->nullable()
    //             ->badge()
    //             ->translatable('product')
    //             ->showOnExport(),
    //         Switcher::make('publish', 'is_publish')->updateOnPreview()->translatable('product')->sortable()->showOnExport(),
    //         BelongsToMany::make('products', 'products', resource: new ProductResource)
    //             ->onlyCount()
    //             ->translatable('product')->showOnExport(),
    //         Number::make('sorting')->buttons()->default(0),
    //     ];
    // }

    // public function indexFields(): array
    // {
    //     return [
    //         Position::make(),
    //         Image::make('thumbnail')->dir('products')->translatable('product')->showOnExport(),
    //         StackFields::make('title')->fields([
    //             Text::make('name')->updateOnPreview()->showOnExport(),
    //             Slug::make('slug')->showOnExport(),
    //         ])->translatable('product'),
    //         BelongsTo::make('parent', 'category', resource: new CategoryResource())
    //             ->nullable()
    //             ->badge()
    //             ->translatable('product')
    //             ->showOnExport(),
    //         Switcher::make('publish', 'is_publish')->updateOnPreview()->translatable('product')->sortable()->showOnExport(),
    //         // BelongsToMany::make('products', 'products', resource: new ProductResource)
    //         //     ->onlyCount()
    //         //     ->translatable('product')->showOnExport() ,
    //         ID::make()->showOnExport(),
    //     ];
    // }

    public function formFields(): array
    {
        return [
            Grid::make([
                Column::make([
                    Text::make('name')->required(),
                    Slug::make('slug')->from('name')->unique(),
                    BelongsTo::make('parent', 'category', resource: new CategoryResource())
                        ->nullable()
                        ->badge()
                        ->translatable('product')
                        ->asyncSearch(),
                    Text::make('meta_keywords'),
                ])->columnSpan(8),
                Column::make([
                    Number::make('sorting')->buttons()->default(0),
                    Text::make('user_id')->required(),
                    Text::make('type')->required(),
                    Image::make('thumbnail')->dir('categories')->translatable('product'),
                    Switcher::make('publish', 'is_publish')->translatable('product')->required(),
                ])->columnSpan(4),
            ]),
            Textarea::make('description')->translatable('product'),
            Textarea::make('meta_description')->translatable('product'),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'user_id' => ['required'],
            'type' => ['required'],
            'name' => ['required'],
            'is_publish' => ['required'],
        ];
    }

    /*
    * перенаправление после сохранения
    */
    public function redirectAfterSave(): string
    {
        return to_page(resource: CategoryResource::class);
    }

    /*
    * перенаправление после удаления
    */
    public function redirectAfterDelete(): string
    {
        return to_page(resource: CategoryResource::class);
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
    // public function queryTags(): array
    // {
    //     return [
    //         QueryTag::make(
    //             'all',
    //             fn (Builder $query) => $query
    //         )->translatable('product')->default(),

    //         QueryTag::make(
    //             'publish',
    //             fn (Builder $query) => $query->where('is_publish', '1')
    //         )->translatable('product'),

    //         QueryTag::make(
    //             'not_publish',
    //             fn (Builder $query) => $query->where('is_publish', '0')
    //         )->translatable('product'),
    //     ];
    // }

    public function treeKey(): ?string
    {
        return 'category_id';
    }

    public function sortKey(): string
    {
        return 'sorting';
    }

    /*
    * Кнопка перехода на страницу сайта
    */
    public function buttons(): array
    {
        return [
            ActionButton::make('To site', fn (Category $data) => route('categories.index', $data->slug))->blank(),
        ];
    }
}
