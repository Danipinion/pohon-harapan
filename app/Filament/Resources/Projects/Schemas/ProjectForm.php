<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Models\Project;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(Project::class, 'slug', ignoreRecord: true),
                Textarea::make('short_description')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('body')
                    ->required()
                    ->columnSpanFull()
                    ->json(),
                TextInput::make('location')
                    ->required(),
                TextInput::make('target_trees')
                    ->required()
                    ->numeric(),
                TextInput::make('cost_per_tree')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('partner_name')
                    ->label('Nama Mitra'),
                Select::make('status')
                    ->options(['active' => 'Active', 'completed' => 'Completed', 'pending' => 'Pending'])
                    ->default('pending')
                    ->required(),
            ]);
    }
}
