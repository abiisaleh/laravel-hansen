<?php

namespace App\Filament\Resources\SuratKeteranganResource\Pages;

use App\Filament\Resources\SuratKeteranganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSuratKeterangans extends ListRecords
{
    protected static string $resource = SuratKeteranganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
