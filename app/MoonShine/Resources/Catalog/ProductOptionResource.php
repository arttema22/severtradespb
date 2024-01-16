<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Catalog;


use App\Models\Catalog\ProductOption;
use MoonShine\Fields\Position;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\Fields\Text;

class ProductOptionResource extends ModelResource
{
    protected string $model = ProductOption::class;

    public string $column = 'title';

    protected string $title = 'Options';

    public function fields(): array
    {
        return [
            Position::make()->hideOnUpdate(),
            Block::make([
                Text::make('title')->translatable('catalog'),
            ]),
            HasMany::make('values', 'values', resource: new ProductOptionValueResource())
                ->fields(
                    [
                        Text::make('', 'title'),
                    ]
                )->creatable()
            //->onlyLink()
            ,
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
