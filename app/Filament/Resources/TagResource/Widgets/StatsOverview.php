<?php

namespace App\Filament\Resources\TagResource\Widgets;

use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Tags', Tag::count()),
            Stat::make('Tags with Posts', Tag::has('posts')->count()),
            Stat::make('Unused Tags', Tag::doesntHave('posts')->count()),
        ];
    }
} 