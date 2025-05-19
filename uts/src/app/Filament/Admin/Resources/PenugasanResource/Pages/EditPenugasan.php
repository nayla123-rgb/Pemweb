<?php

namespace App\Filament\Admin\Resources\PenugasanResource\Pages;

use App\Filament\Admin\Resources\PenugasanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPenugasan extends EditRecord
{
    protected static string $resource = PenugasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
