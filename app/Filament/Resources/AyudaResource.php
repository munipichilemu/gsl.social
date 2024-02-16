<?php

namespace App\Filament\Resources;

use App\Filament\Exports\AyudasEntregadasExporter;
use App\Filament\Resources\AyudaResource\Pages;
use App\Models\Ayuda;
use App\Models\Beneficiario;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class AyudaResource extends Resource
{
    protected static ?string $model = Ayuda::class;

    protected static ?string $navigationIcon = 'heroicon-s-lifebuoy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('beneficiario_id')
                    ->label('RUT Beneficiario')
                    ->prefixIcon('heroicon-o-identification')
                    ->options(Beneficiario::all()->pluck('rut', 'id'))
                    ->placeholder('Ingrese el RUT del beneficiario')
                    ->selectablePlaceholder(false)
                    ->searchable()
                    ->optionsLimit(5)
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Placeholder::make('selected_beneficiario')
                    ->label('')
                    ->extraAttributes(['class' => 'mt-6 pt-3 text-gray-600 text-xl font-bold'])
                    ->content(fn (Forms\Get $get): ?string => Beneficiario::find($get('beneficiario_id'))?->full_name),

                Forms\Components\TextInput::make('social_report_num')
                    ->label('Nº Informe Social')
                    ->prefixIcon('heroicon-o-document-text')
                    ->required()
                    ->numeric()
                    ->columnStart(1),
                Forms\Components\DatePicker::make('social_report_date')
                    ->label('Fecha Informe Social')
                    ->prefixIcon('heroicon-o-calendar-days')
                    ->required(),

                Forms\Components\TextInput::make('amount_given')
                    ->label('Monto ayuda otorgada')
                    ->prefixIcon('heroicon-o-currency-dollar')
                    ->numeric(),
                Forms\Components\DatePicker::make('given_at')
                    ->label('Fecha ayuda otorgada')
                    ->prefixIcon('heroicon-o-calendar-days'),

                Forms\Components\Select::make('tipo_ayuda')
                    ->label('Ayudas otorgadas')
                    ->multiple()
                    ->minItems(1)
                    ->preload()
                    ->relationship('tipos', 'name'),
                Forms\Components\Toggle::make('report_submitted')
                    ->label('Rendición entregada')
                    ->inline(false)
                    ->onIcon('heroicon-o-check')
                    ->onColor('success')
                    ->offIcon('heroicon-o-x-mark')
                    ->offColor('danger'),

                Forms\Components\MarkdownEditor::make('observations')
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('beneficiario.full_name')
                    ->description(fn (Ayuda $record) => $record->beneficiario->rut)
                    ->weight(FontWeight::Bold)
                    ->searchable(['names', 'lastname_1', 'lastname_2', 'rut_num']),

                Tables\Columns\TextColumn::make('social_report_num')
                    ->label('N.º Informe Social')
                    ->searchable(),
                Tables\Columns\TextColumn::make('social_report_date')
                    ->label('Fecha Informe Social')
                    ->alignRight()
                    ->date('d F Y'),
                Tables\Columns\TextColumn::make('tipos.name')
                    ->label('Ayudas prestadas')
                    ->badge()
                    ->separator(),
                Tables\Columns\TextColumn::make('amount_given')
                    ->label('Monto')
                    ->prefix('$')
                    ->alignRight()
                    ->numeric(),
                Tables\Columns\TextColumn::make('given_at')
                    ->label('Fecha otorgada')
                    ->alignRight()
                    ->date('d F Y'),

                Tables\Columns\ToggleColumn::make('report_submitted')
                    ->label('Rendido')
                    ->onIcon('heroicon-o-check')
                    ->onColor('success')
                    ->offIcon('heroicon-o-x-mark')
                    ->offColor('danger'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ingresado')
                    ->date('d F Y')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d F Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                DateRangeFilter::make('created_at')
                    ->label('Fecha de ingreso'),
                DateRangeFilter::make('given_at')
                    ->label('Fecha otorgamiento'),
                DateRangeFilter::make('social_report_date')
                    ->label('Fecha Informe Social'),
            ])
            ->filtersTriggerAction(fn (Tables\Actions\Action $action) => $action->button()->label('Filtros'))
            ->toggleColumnsTriggerAction(fn (Tables\Actions\Action $action) => $action->button()->label('Columnas'))
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->tooltip('Editar'),
            ])
            ->headerActions([
                Tables\Actions\ExportAction::make()
                    ->label('Exportar registros')
                    ->icon('heroicon-s-table-cells')
                    ->color(Color::Green)
                    ->exporter(AyudasEntregadasExporter::class)
                    ->formats([
                        ExportFormat::Xlsx,
                    ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAyudas::route('/'),
            'create' => Pages\CreateAyuda::route('/create'),
            'edit' => Pages\EditAyuda::route('/{record}/edit'),
        ];
    }
}
