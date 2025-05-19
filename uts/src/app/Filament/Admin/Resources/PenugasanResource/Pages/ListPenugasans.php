<?php

namespace App\Filament\Admin\Resources\PenugasanResource\Pages;

use App\Filament\Admin\Resources\PenugasanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenugasans extends ListRecords
{
    protected static string $resource = PenugasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
