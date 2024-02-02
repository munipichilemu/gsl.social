<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoResource\Pages;
use App\Filament\Resources\TipoResource\RelationManagers;
use App\Models\Tipo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use function Livewire\str as str;

class TipoResource extends Resource
{
    protected static ?string $model = Tipo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required(),
                Forms\Components\MarkdownEditor::make('descripcion')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->description(fn (Tipo $record) => str((string) $record->descripcion)->inlineMarkdown()->toHtmlString())
                    ->searchable()
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
            'index' => Pages\ManageTipos::route('/'),
        ];
    }
}
