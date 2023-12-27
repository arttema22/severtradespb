<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog;

use MoonShine\Fields\ID;
use MoonShine\Fields\Text;

use MoonShine\Fields\Number;
use MoonShine\Fields\Position;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catalog\Productattribute;
use MoonShine\Fields\Relationships\HasMany;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\Fields\Relationships\BelongsToMany;

class ProductattributeResource extends ModelResource
{
    protected string $model = Productattribute::class;

    public string $column = 'name';

    protected string $title = 'Productattributes';

    public function fields(): array
    {
        return [
            Block::make([
                Position::make(),
                ID::make()->sortable(),
                Text::make('name'),
                Switcher::make('required'),
                Number::make('sorting'),
                BelongsToMany::make('Categories', 'category', resource: new CategoryResource())
                    ->inLine(badge: true),
                HasMany::make('values', 'values', resource: new ProductattributevalueResource())
                    ->fields([Text::make('value_text')]),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
