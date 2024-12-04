<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\Widgets;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('featured_image')
                    ->image()
                    ->directory('posts')
                    ->disk('public')
                    ->visibility('public'),
                Forms\Components\Toggle::make('is_published')
                    ->label('Published')
                    ->default(false),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Publish Date'),
                Forms\Components\Select::make('author_id')
                    ->relationship('author', 'name')
                    ->required(),
                Forms\Components\Select::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->required(),
                Forms\Components\Select::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple(),
                Forms\Components\Textarea::make('excerpt')
                    ->rows(2),
                Forms\Components\Textarea::make('meta_description')
                    ->rows(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->circular()
                    ->size(40)
                    ->width('40px'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(30)
                    ->description(fn (Post $record): string => Str::limit($record->excerpt ?? '', 50))
                    ->wrap()
                    ->width('300px'),
                Tables\Columns\TextColumn::make('author.name')
                    ->sortable()
                    ->toggleable()
                    ->width('150px'),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Status')
                    ->alignCenter()
                    ->width('100px'),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable()
                    ->width('180px'),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('author')
                    ->relationship('author', 'name'),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published Status')
                    ->boolean()
                    ->trueLabel('Published')
                    ->falseLabel('Draft')
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Widgets\StatsOverview::class,
        ];
    }
}
