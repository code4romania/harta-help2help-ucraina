<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\BeneficiaryGroupResource\Pages;
use App\Models\BeneficiaryGroup;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class BeneficiaryGroupResource extends Resource
{
    protected static ?string $model = BeneficiaryGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
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
            'index' => Pages\ListBeneficiaryGroups::route('/'),
            'create' => Pages\CreateBeneficiaryGroup::route('/create'),
            'edit' => Pages\EditBeneficiaryGroup::route('/{record}/edit'),
        ];
    }
    public static function getLabel(): ?string
    {
        return (__('filament.labels.plural.beneficiary_group'));
    }
    public static function getPluralLabel(): ?string
    {
        return (__('filament.labels.plural.beneficiary_group'));
    }
}
