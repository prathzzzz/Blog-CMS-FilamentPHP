<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Post::count()),
            Stat::make('Published Posts', Post::where('is_published', true)->count()),
            Stat::make('Draft Posts', Post::where('is_published', false)->count()),
        ];
    }
}
