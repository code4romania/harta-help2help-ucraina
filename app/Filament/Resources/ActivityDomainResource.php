<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityDomainResource\Pages;
use App\Filament\Resources\ActivityDomainResource\RelationManagers;
use App\Models\ActivityDomain;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityDomainResource extends Resource
{
    protected static ?string $model = ActivityDomain::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListActivityDomains::route('/'),
            'create' => Pages\CreateActivityDomain::route('/create'),
            'edit' => Pages\EditActivityDomain::route('/{record}/edit'),
        ];
    }
}
