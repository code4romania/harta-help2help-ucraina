<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\BeneficiaryGroupResource\Pages;
use App\Models\BeneficiaryGroup;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BeneficiaryGroupResource extends Resource
{
    protected static ?string $model = BeneficiaryGroup::class;

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
            'index' => Pages\ListBeneficiaryGroups::route('/'),
            'create' => Pages\CreateBeneficiaryGroup::route('/create'),
            'edit' => Pages\EditBeneficiaryGroup::route('/{record}/edit'),
        ];
    }
}
