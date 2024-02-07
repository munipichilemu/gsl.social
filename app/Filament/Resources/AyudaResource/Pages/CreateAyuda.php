<?php

namespace App\Filament\Resources\AyudaResource\Pages;

use App\Filament\Resources\AyudaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAyuda extends CreateRecord
{
    protected static string $resource = AyudaResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
