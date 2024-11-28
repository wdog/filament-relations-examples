<?php

namespace App\Filament\Resources\ThiefResource\Pages;

use App\Filament\Resources\ThiefResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThieves extends ListRecords
{
    protected static string $resource = ThiefResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
