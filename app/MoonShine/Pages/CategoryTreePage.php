<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Pages\Page;
use MoonShine\Pages\Crud\IndexPage;
use Leeto\MoonShineTree\View\Components\TreeComponent;

class CategoryTreePage extends IndexPage
{
    protected function mainLayer(): array
    {
        return [
            ...$this->actionButtons(),
            TreeComponent::make($this->getResource()),
        ];
    }
}
