<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Position;
use MoonShine\Decorations\Block;
use App\Models\Catalog\Productattributevalue;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\BelongsTo;

class ProductattributevalueResource extends ModelResource
{
    protected string $model = Productattributevalue::class;

    protected string $title = 'Productattributevalues';

    public function fields(): array
    {
        return [
            Block::make([
                Position::make(),
                ID::make()->sortable(),
                Text::make('value_text'),
                Text::make('value_integer'),
                Text::make('value_boolean'),
                Text::make('value_float'),
                Text::make('value_date'),
                BelongsTo::make('attribute', 'attribute', resource: new ProductattributeResource()),
                BelongsTo::make('product', 'product', resource: new ProductResource()),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
