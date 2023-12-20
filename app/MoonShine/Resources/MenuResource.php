<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\MenuItem;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Url;

class MenuResource extends ModelResource
{
    protected string $model = MenuItem::class;

    protected string $title = 'Menus';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('title'),
                Url::make('url'),
                Text::make('parent_id'),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
