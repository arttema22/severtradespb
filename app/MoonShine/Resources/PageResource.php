<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Page;
use MoonShine\Fields\ID;

use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Position;
use MoonShine\Fields\Switcher;
use MoonShine\Enums\ClickAction;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\ActionButtons\ActionButton;

class PageResource extends ModelResource
{
    protected string $model = Page::class;

    // protected bool $createInModal = true;

    // protected bool $editInModal = true;

    public string $column = 'title';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    protected int $itemsPerPage = 25;

    public function title(): string
    {
        return __('page.pages');
    }

    public function indexFields(): array
    {
        return [
            Position::make(),
            Image::make('thumbnail')->dir('pages')->translatable('page'),
            Text::make('title')->translatable('page'),
            Switcher::make('is_publish')->updateOnPreview()->translatable('page'),
        ];
    }

    public function formFields(): array
    {
        return [
            Text::make('user_id')->required()->translatable('page'),
            Text::make('title')->required()->translatable('page'),
            Slug::make('slug')->from('title')->unique()->translatable('page'),
            TinyMce::make('content')->required()->translatable('page'),
            Image::make('thumbnail')->dir('pages')->translatable('page'),
            Text::make('meta_description')->translatable('page'),
            Text::make('meta_keywords')->translatable('page'),
            Switcher::make('is_publish')->translatable('page'),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'user_id' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
            'is_publish' => ['required'],
        ];
    }

    /*
    * перенаправление после сохранения
    */
    public function redirectAfterSave(): string
    {
        return to_page(resource: PageResource::class);
    }

    /*
    * перенаправление после удаления
    */
    public function redirectAfterDelete(): string
    {
        return to_page(resource: PageResource::class);
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
        return ['title'];
    }

    /*
    * Кнопка перехода на страницу сайта
    */
    public function buttons(): array
    {
        return [
            ActionButton::make('To site', fn (Page $data) => route('pages.index', $data->slug))->blank(),
        ];
    }
}
