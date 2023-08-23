<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\InterventionDomainResource\Pages;
use App\Models\InterventionDomain;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class InterventionDomainResource extends Resource
{
    use Translatable;

    protected static ?string $model = InterventionDomain::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),

                Select::make('icon')
                    ->options([
                        'health' => 'health',
                        'food' => 'food',
                        'house' => 'house',
                        'hygiene' => 'hygiene',
                        'finance_support' => 'finance_support',
                        'protection' => 'protection',
                        'education' => 'education',
                        'management' => 'management',
                        'integration' => 'integration',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('icon'),
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
            'create' => Pages\CreateInterventionDomain::route('/create'),
            'edit' => Pages\EditInterventionDomain::route('/{record}/edit'),
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
