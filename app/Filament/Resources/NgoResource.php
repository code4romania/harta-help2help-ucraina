<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\NgoResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers\ServicesRelationManager;
use App\Models\ActivityDomain;
use App\Models\County;
use App\Models\Ngo;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class NgoResource extends Resource
{
    use Translatable;

    protected static ?string $model = Ngo::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        $activityDomains = ActivityDomain::pluck('name', 'id');

        return $form
            ->schema([
                Forms\Components\Grid::make()->schema([
                    Card::make()
                        ->columnSpan(2)
                        ->columns(2)
                        ->schema([
                            Forms\Components\TextInput::make('name')->required()
                                ->afterStateUpdated(function (Closure $set, $state) {
                                    $set('slug', Str::slug($state));
                                })->reactive(),
                            Forms\Components\TextInput::make('slug')->disabled(),
                            Forms\Components\TextInput::make('number_of_beneficiaries')->integer(),
                            Forms\Components\TextInput::make('story'),

                            Forms\Components\Select::make('county_id')
                                ->label('County')
                                ->options(County::pluck('name', 'id'))
                                ->required()
                                ->reactive()
                                ->searchable()
                                ->afterStateUpdated(fn (callable $set) => $set('city_id', null)),

                            Forms\Components\Select::make('city_id')
                                ->label('City')
                                ->required()
                                ->options(
                                    fn (callable $get) => County::find($get('county_id'))
                                        ?->cities
                                        ->pluck('name', 'id')
                                )
                                ->searchable()
                                ->reactive(),
                            Forms\Components\Select::make('activity_domains')->options($activityDomains)->multiple(),
                            SpatieMediaLibraryFileUpload::make('logo')->conversion('thumb'),
                            Forms\Components\RichEditor::make('description')->columnSpan(2)->required(),
                        ]),
                    Card::make()
                        ->columns(2)
                        ->schema([
                            Forms\Components\TextInput::make('phone'),
                            Forms\Components\TextInput::make('contact_email')
                                ->email(),
                            Forms\Components\TextInput::make('address'),
                            Forms\Components\TextInput::make('website')
                                ->url(),
                            Forms\Components\TextInput::make('social_icons.facebook')
                                ->label('Facebook')
                                ->url(),
                        ]),
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('number_of_beneficiaries'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('contact_email'),
                Tables\Columns\TextColumn::make('website'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->iconButton(),
                Tables\Actions\ViewAction::make()->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ServicesRelationManager::class,
        ];
    }

    public static function getTranslatableLocales(): array
    {
        return config('filament-spatie-laravel-translatable-plugin.default_locales');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNgos::route('/'),
            'create' => Pages\CreateNgo::route('/create'),
            'edit' => Pages\EditNgo::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): ?string
    {
        return __('filament.labels.singular.ngos');
    }

    public static function getPluralLabel(): ?string
    {
        return __('filament.labels.plural.ngos');
    }
}
