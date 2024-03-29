<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\ServiceApplicationType;
use App\Filament\Resources\ServiceResource\Pages;
use App\Models\County;
use App\Models\Service;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    use Translatable;

    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->columnSpan(2)
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->afterStateUpdated(fn (Closure $set, $state) => $set('slug', Str::slug($state)))
                            ->reactive(),

                        TextInput::make('slug')
                            ->disabled(),

                        TextInput::make('project_name')
                            ->required(),

                        Select::make('ngo_id')->relationship('ngo', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('county_id')
                            ->label('County')
                            ->options(County::pluck('name', 'id'))
                            ->required()
                            ->reactive()
                            ->searchable()
                            ->afterStateUpdated(fn (callable $set) => $set('city_id', null)),

                        Select::make('city_id')
                            ->label('City')
                            ->required()
                            ->options(
                                fn (callable $get) => County::find($get('county_id'))
                                    ?->cities
                                    ->pluck('name', 'id')
                            )
                            ->searchable()
                            ->reactive(),

                        Grid::make()
                            ->columns(3)
                            ->schema([
                                TextInput::make('duration')
                                    ->required(),

                                Select::make('status')
                                    ->options([
                                        'active' => 'În derulare/Activ',
                                        'finished' => 'Finalizat',
                                    ])
                                    ->required(),

                                TextInput::make('budget')
                                    ->required(),
                            ]),

                        TextInput::make('lat')
                            ->numeric()
                            ->minValue(-90)
                            ->maxValue(90)
                            ->required(),

                        TextInput::make('lng')
                            ->numeric()
                            ->minValue(-180)
                            ->maxValue(180)
                            ->required(),

                        Select::make('intervention_domains')
                            ->relationship('interventionDomains', 'name')
                            ->multiple()
                            ->required(),

                        Select::make('beneficiary_groups')
                            ->relationship('beneficiaryGroups', 'name')
                            ->multiple()
                            ->required(),
                    ]),
                Card::make()
                    ->columns(2)
                    ->schema([
                        Repeater::make('application_methods')
                            ->columnSpan(2)
                            ->schema([
                                Select::make('type')
                                    ->options(ServiceApplicationType::selectable())
                                    ->reactive()
                                    ->required(),

                                TextInput::make('application_url')
                                    ->url()
                                    ->hidden(fn (Closure $get) => $get('type') !== ServiceApplicationType::Online->value)
                                    ->required(),

                                TextInput::make('application_phone')
                                    ->hidden(fn (Closure $get) => $get('type') !== ServiceApplicationType::Phone->value)
                                    ->requiredWithout('application_email'),

                                TextInput::make('application_email')
                                    ->email()
                                    ->hidden(fn (Closure $get) => $get('type') !== ServiceApplicationType::Phone->value)
                                    ->requiredWithout('application_phone'),

                                TextInput::make('application_address')
                                    ->hidden(fn (Closure $get) => $get('type') !== ServiceApplicationType::Physical->value)
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('ngo.name'),
                TextColumn::make('duration'),
                IconColumn::make('status')
                    ->options([
                        'heroicon-o-badge-check' => 'active',
                        'heroicon-o-x-circle' => 'finished',
                    ]),

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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('filament.labels.singular.services');
    }

    public static function getPluralLabel(): ?string
    {
        return __('filament.labels.plural.services');
    }
}
