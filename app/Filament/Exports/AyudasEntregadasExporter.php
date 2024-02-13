<?php

namespace App\Filament\Exports;

use App\Models\Ayuda;
use App\Models\Beneficiario;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class AyudasEntregadasExporter extends Exporter
{
    protected static ?string $model = Ayuda::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('program')
                ->label('Programa Municipal')
                ->state('Asistencia Social'),
            ExportColumn::make('tipos.name')
                ->label('Beneficio o servicio'),
            ExportColumn::make('social_report_num')
                ->label('N.º Informe Social'),
            ExportColumn::make('given_at')
                ->label('Fecha otorgamiento'),
            ExportColumn::make('beneficiario.rut_num')
                ->label('RUN'),
            ExportColumn::make('beneficiario.rut_vd')
                ->label('DV'),
            ExportColumn::make('beneficiario.names')
                ->label('Nombres'),
            ExportColumn::make('beneficiario.lastname_1')
                ->label('Apellido Paterno'),
            ExportColumn::make('beneficiario.lastname_2')
                ->label('Apellido Materno'),
            ExportColumn::make('beneficiario.nationality')
                ->label('Nacionalidad')
                ->formatStateUsing(fn (string $state): string => Beneficiario::country($state)),
            ExportColumn::make('amount_given')
                ->label('Monto'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Se han exportado '.number_format($export->successful_rows).' '.str('registro')->plural($export->successful_rows).' exitosamente.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.number_format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }

    public function getFileName(Export $export): string
    {
        $export_date = now()->format('Ymd');
        return "ReporteAyudasSociales-{$export_date}-{$export->getKey()}.xlsx";
    }
}
