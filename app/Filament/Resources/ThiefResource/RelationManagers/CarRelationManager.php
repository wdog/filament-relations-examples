<?php

namespace App\Filament\Resources\ThiefResource\RelationManagers;

use App\Models\Car;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class CarRelationManager extends RelationManager
{
    protected static string $relationship = 'cars';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // this does not use form but only relation name
                Tables\Actions\AssociateAction::make()
                    ->multiple()
                    ->recordSelectOptionsQuery(
                        // Scope - show only free cars
                        fn(Builder $query) => $query->where('thief_id', null)

                    )
                    ->recordSelect(
                        fn(Select $select) => $select->placeholder('Steal a Car'),
                    )
                    ->preloadRecordSelect(),
            ])
            ->actions([
                Tables\Actions\DissociateAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DissociateBulkAction::make()->label('Release Cars'),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\AssociateAction::make(),
            ]);
    }
}
