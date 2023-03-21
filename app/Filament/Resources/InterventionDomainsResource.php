<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\InterventionDomainsResource\Pages;
use App\Models\InterventionDomains;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class InterventionDomainsResource extends Resource
{
    protected static ?string $model = InterventionDomains::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
}
