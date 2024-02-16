<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeneficiarioResource\Pages;
use App\Forms\Components\RutInput;
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

    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RutInput::make('rut')
                    ->label('RUT Beneficiario')
                    ->rut()
                    ->rules(['rut'])
                    ->rules(
                        ['num_unique:beneficiarios,rut_num'],
                        fn (string $context): bool => $context === 'create'
                    )
                    ->disabled(fn (string $context): bool => $context === 'edit')
                    ->validationAttribute('beneficiario')
                    ->required(),

                Forms\Components\TextInput::make('names')
                    ->label('Nombres')
                    ->columnStart(1)
                    ->required(),
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
                    ->default('CL')
                    ->required(),

                Forms\Components\MarkdownEditor::make('annotations')
                    ->label('Notas')
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
                    ->searchable(['rut_num']),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->tooltip('Editar')
                    ->color('info'),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Eliminar')
                    ->color('danger'),
                Tables\Actions\RestoreAction::make()
                    ->iconButton()
                    ->tooltip('Restaurar')
                    ->color('success'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make()
                        ->color('success'),
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
