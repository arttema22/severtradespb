<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Hidden;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Pages\Crud\DetailPage;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Pages\CategoryTreePage;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Relationships\BelongsTo;
use Leeto\MoonShineTree\Resources\TreeResource;
use MoonShine\Fields\Relationships\BelongsToMany;
use App\MoonShine\Resources\Catalog\ProductattributeResource;

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

    /*
    * Основной запрос
    */
    public function query(): Builder
    {
        return parent::query()->where('type', 1);
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
                        BelongsTo::make('parent', 'category', resource: new CategoryResource())
                            ->nullable()
                            ->badge()
                            ->translatable('product')
                            ->asyncSearch(),
                        Switcher::make('publish', 'is_publish')->translatable('product'),
                    ]),
                ])->columnSpan(8),
                Column::make([
                    Textarea::make('meta_description')->translatable('product'),
                    Text::make('meta_keywords')->translatable('product'),
                    Image::make('thumbnail')->dir('products')->removable()->translatable('product'),
                    Number::make('sorting')->buttons()->default(0),
                    BelongsToMany::make('attributes', 'attributes', resource: new ProductattributeResource())
                        ->selectMode()->creatable(),
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
