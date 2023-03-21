<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\ServiceApplicationType;
use App\Filament\Resources\ServiceResource\Pages;
use App\Models\BeneficiaryGroup;
use App\Models\InterventionDomains;
use App\Models\Service;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    use Translatable;

    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        $beneficiaryGroup = BeneficiaryGroup::pluck('name', 'id');

        $interventionDomains = InterventionDomains::pluck('name', 'id');

        return $form
            ->schema([

                Card::make()
                    ->columnSpan(2)
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')->required()
                            ->afterStateUpdated(function (Closure $set, $state) {
                                $set('slug', Str::slug($state));
                            })->reactive(),
                        Forms\Components\TextInput::make('slug')->disabled(),
                        Forms\Components\Select::make('ngo_id')->relationship('ngo', 'name')
                            ->searchable()
                            ->preload(),
                        Forms\Components\TextInput::make('website_project')->required(),
                        Forms\Components\RichEditor::make('description')->columnSpan(2)->required(),
                        Forms\Components\DatePicker::make('start')->required(),
                        Forms\Components\DatePicker::make('end')->required()->after('start'),
                        Forms\Components\TextInput::make('budget'),
                        Forms\Components\Select::make('intervention_domains')->options($interventionDomains)->multiple(),
                        Forms\Components\Select::make('beneficiary_groups')->options($beneficiaryGroup)->multiple(),

                    ]),
                Card::make()->columns(2)->schema([
                    Forms\Components\Repeater::make('application_methods')->columnSpan(2)->schema([
                        Forms\Components\Select::make('type')->options(ServiceApplicationType::selectable())->reactive()->required(),
                        Forms\Components\RichEditor::make('description')->required(),
                        Forms\Components\TextInput::make('application_url')->url()->hidden(fn (Closure $get) => $get('type') !== ServiceApplicationType::Online->value)->required(),
                        Forms\Components\TextInput::make('application_phone')->hidden(fn (Closure $get) => $get('type') !== ServiceApplicationType::Phone->value)->required(),
                        Forms\Components\TextInput::make('application_email')->email()->hidden(fn (Closure $get) => $get('type') !== ServiceApplicationType::Phone->value)->required(),
                        Forms\Components\TextInput::make('application_address')->hidden(fn (Closure $get) => $get('type') !== ServiceApplicationType::Physical->value)->required(),
                    ])->defaultItems(0),
                ]),
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
