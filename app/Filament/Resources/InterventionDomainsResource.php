<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\InterventionDomainsResource\Pages;
use App\Models\InterventionDomains;
use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class InterventionDomainsResource extends Resource
{
    use Translatable;

    protected static ?string $model = InterventionDomains::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                })->reactive(),
                TextInput::make('slug')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInterventionDomains::route('/'),
            'create' => Pages\CreateInterventionDomains::route('/create'),
            'edit' => Pages\EditInterventionDomains::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('filament.labels.singular.intervention_domains');
    }

    public static function getPluralLabel(): ?string
    {
        return __('filament.labels.plural.intervention_domains');
    }
}
