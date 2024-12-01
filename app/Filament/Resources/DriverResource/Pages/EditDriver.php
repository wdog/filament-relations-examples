<?php

namespace App\Filament\Resources\DriverResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Log;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\DriverResource;

class EditDriver extends EditRecord
{
    protected static string $resource = DriverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // refresh table in relation manager
    public function afterSave(): void
    {
        $this->dispatch('table-refresh');
    }
}
