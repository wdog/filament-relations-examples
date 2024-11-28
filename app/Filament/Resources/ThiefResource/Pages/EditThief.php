<?php

namespace App\Filament\Resources\ThiefResource\Pages;

use App\Filament\Resources\ThiefResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThief extends EditRecord
{
    protected static string $resource = ThiefResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
