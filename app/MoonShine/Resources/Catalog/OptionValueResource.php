<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog;

use MoonShine\Fields\Text;
use App\Models\Catalog\ProductOptionValue;
use MoonShine\Fields\Position;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Resources\Catalog\OptionResource;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;

class OptionValueResource extends ModelResource
{
    protected string $model = ProductOptionValue::class;

    public string $column = 'title';

    protected string $title = 'OptionValues';

    public function fields(): array
    {
        return [
            Position::make()->hideOnUpdate(),
            Block::make([
                Text::make('title')->translatable('catalog'),
                BelongsTo::make('option', 'option', resource: new OptionResource())
                    ->sortable()
                    ->translatable('catalog'),
            ]),


            BelongsToMany::make('products', 'products', resource: new ProductResource())
                ->onlyCount()
                ->selectMode()
                ->asyncSearch('name')
                ->translatable('catalog'),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
