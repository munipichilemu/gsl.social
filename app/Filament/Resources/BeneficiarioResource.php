<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeneficiarioResource\Pages;
use App\Models\Beneficiario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Laragear\Rut\Rut;
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

class BeneficiarioResource extends Resource
{
    protected static ?string $model = Beneficiario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rut')
                    ->rules('rut')
                    ->formatStateUsing(fn (?string $state): string => $state ?? '')
                    ->required(),
                Forms\Components\TextInput::make('nombres')
                    ->required()
                    ->live(),
                Forms\Components\TextInput::make('apellido_1')
                    ->required(),
                Forms\Components\TextInput::make('apellido_2')
                    ->required(),
                Forms\Components\TextInput::make('direccion'),
                Forms\Components\TextInput::make('telefono')
                    ->tel()
                    ->mask('999 999 999')
                    ->prefix('+56'),
                Country::make('nacionalidad')
                    ->required()
                    ->searchable()
                    ->default('CL'),
                Forms\Components\MarkdownEditor::make('anotaciones')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rut')
                    ->label('RUT')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombres')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_1')
                    ->label('Primer Apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_2')
                    ->label('Segundo Apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->label('Dirección')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->prefix('+56')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nacionalidad')
                    ->formatStateUsing(fn (string $state): string => Beneficiario::pais($state))
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
