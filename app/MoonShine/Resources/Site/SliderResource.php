<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Site;

use App\Models\Slider;
use MoonShine\Fields\ID;

use MoonShine\Fields\Url;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Date;
use MoonShine\Fields\Number;

class SliderResource extends ModelResource
{
    protected string $model = Slider::class;

    protected bool $createInModal = false;

    protected bool $editInModal = false;

    public string $column = 'name';

    public function title(): string
    {
        return __('site.slider');
    }

    public function indexFields(): array
    {
        return [
            Number::make('sorting')
                ->sortable()
                ->updateOnPreview()
                ->buttons()
                ->translatable('site'),
            Image::make('image')
                ->dir('slider')
                ->allowedExtensions(['png', 'jpg', 'jpeg'])
                ->removable()
                ->enableDeleteDir()
                ->disableDownload()
                ->translatable('site'),
            Text::make('name')
                ->updateOnPreview()
                ->translatable('site'),
            Switcher::make('publish', 'is_publish')
                ->updateOnPreview()
                ->translatable('site'),
        ];
    }

    public function formFields(): array
    {
        return [
            // Text::make('moonshine_user_id'),
            Text::make('name')
                ->required()
                ->translatable('site'),

            Divider::make(),

            Grid::make([
                Column::make([
                    Block::make([
                        Text::make('title')
                            ->translatable('site'),
                        Textarea::make('text')
                            ->translatable('site'),
                        Divider::make('button')
                            ->centered()
                            ->translatable('site'),
                        Text::make('btn_title')
                            ->translatable('site'),
                        Url::make('btn_url')
                            ->translatable('site')
                            ->showWhen('btn_title', '!=', empty('btn_title')),
                        Text::make('btn_icon')
                            ->translatable('site')
                            ->link('https://remixicon.com/', 'Remix Icon', blank: true)
                            ->hint('For example: ri-mail-line')
                            ->showWhen('btn_title', '!=', empty('btn_title')),
                        Divider::make('bage')
                            ->centered()
                            ->translatable('site'),
                        Text::make('bage_title')
                            ->translatable('site'),
                        Text::make('bage_icon')
                            ->translatable('site')
                            ->link('https://remixicon.com/', 'Remix Icon', blank: true)
                            ->hint('For example: ri-mail-line')
                            ->showWhen('bage_title', '!=', empty('bage_title')),
                    ]),
                ])->columnSpan(8),
                Column::make([
                    Block::make([
                        Image::make('image')
                            ->dir('slider')
                            ->allowedExtensions(['png', 'jpg', 'jpeg'])
                            ->removable()
                            ->enableDeleteDir()
                            ->disableDownload()
                            ->translatable('site'),
                        Number::make('sorting')
                            ->buttons()
                            ->translatable('site'),
                        Switcher::make('publish', 'is_publish')
                            ->translatable('site'),
                    ]),
                    Flex::make([
                        Date::make('created_at')
                            ->disabled()
                            ->translatable('site'),
                        Date::make('updated_at')
                            ->disabled()
                            ->translatable('site'),
                        // Date::make('deleted_at'),
                    ]),
                ])->columnSpan(4),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'string'],
            'title' => ['nullable', 'string'],
            'text' => ['nullable'],
            'btn_title' => ['nullable', 'string'],
            'btn_url' => ['nullable', 'string'],
            'btn_icon' => ['nullable', 'string'],
            'bage_title' => ['nullable', 'string'],
            'bage_icon' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'image'],
            'sorting' => ['nullable', 'integer'],
            'publish' => ['nullable', 'boolean'],
        ];
    }

    /*
    * перенаправление после сохранения
    */
    public function redirectAfterSave(): string
    {
        return to_page(resource: SliderResource::class);
    }

    /*
    * перенаправление после удаления
    */
    public function redirectAfterDelete(): string
    {
        return to_page(resource: SliderResource::class);
    }

    /*
    * разрешенные действия
    */
    public function getActiveActions(): array
    {
        return ['create', 'update', 'delete', 'massDelete'];
    }
}
