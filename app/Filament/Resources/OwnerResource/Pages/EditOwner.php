<?php

namespace App\Filament\Resources\OwnerResource\Pages;

use App\Models\Car;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\OwnerResource;

class EditOwner extends EditRecord
{
    protected static string $resource = OwnerResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Clear the car's owner if the owner already has a car
        if ($this->record->car) {
            $this->record->car()->update(['owner_id' => null]);
        }

        // Assign the selected car to the owner
        if (!empty($data['car_id'])) {
            $this->record->car()->save(Car::find($data['car_id']));
        }

        return $data;
    }
}
