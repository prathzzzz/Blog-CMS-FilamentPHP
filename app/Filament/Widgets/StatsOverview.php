<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Post::count())
                ->description('Published: ' . Post::where('is_published', true)->count())
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success'),
            
            Stat::make('Categories', Category::count())
                ->description('With posts: ' . Category::has('posts')->count())
                ->descriptionIcon('heroicon-m-rectangle-group')
                ->color('warning'),
            
            Stat::make('Tags', Tag::count())
                ->description('Used in posts: ' . Tag::has('posts')->count())
                ->descriptionIcon('heroicon-m-tag')
                ->color('info'),
        ];
    }
} 