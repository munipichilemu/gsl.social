<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeneficiarioResource\Pages;
use App\Models\Beneficiario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

class BeneficiarioResource extends Resource
{
    protected static ?string $model = Beneficiario::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rut')
                    ->label('RUT')
                    ->rules('rut')
                    ->formatStateUsing(fn (?string $state): string => $state ?? '')
                    ->required(),

                Forms\Components\TextInput::make('names')
                    ->label('Nombres')
                    ->columnStart(1)
                    ->required()
                    ->live(),
                Forms\Components\TextInput::make('lastname_1')
                    ->label('Primer Apellido')
                    ->required(),
                Forms\Components\TextInput::make('lastname_2')
                    ->label('Segundo Apellido')
                    ->required(),

                Forms\Components\TextInput::make('address')
                    ->label('Dirección'),
                Forms\Components\TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel()
                    ->prefix('+56'),
                Country::make('nationality')
                    ->label('Nacionalidad')
                    ->required()
                    ->default('CL'),
                Forms\Components\MarkdownEditor::make('annotations')
                    ->columnSpanFull(),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rut')
                    ->label('RUT')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Nombre Completo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Dirección')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono')
                    ->prefix('+56 ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
                    ->label('Nacionalidad')
                    ->formatStateUsing(fn (string $state): string => Beneficiario::country($state))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha Ingreso')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Última actualización')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->tooltip('Editar')
                    ->color('info'),
                Tables\Actions\DeleteAction::make()
                    ->label('')
                    ->tooltip('Eliminar')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBeneficiarios::route('/'),
        ];
    }
}
