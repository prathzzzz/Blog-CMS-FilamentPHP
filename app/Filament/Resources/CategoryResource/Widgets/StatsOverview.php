<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count()),
            Stat::make('Categories with Posts', Category::has('posts')->count()),
            Stat::make('Empty Categories', Category::doesntHave('posts')->count()),
        ];
    }
} 