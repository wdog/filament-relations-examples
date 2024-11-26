<?php

namespace App\Filament\Resources\ItemResource\RelationManagers;

use Filament\Forms;
use App\Models\Item;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ChildItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'child_items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('item_name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('item_name')
            ->columns([
                Tables\Columns\TextColumn::make('item_name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([

                // cannot be used
                // Tables\Actions\AttachAction::make()

                CreateAction::make()
                    ->form([
                        Select::make('item_id')
                            ->label('Related Item')
                            ->searchable()
                            ->options(
                                Item::whereNot('id', $this->ownerRecord->id)
                                    ->pluck('item_name', 'id')
                            )
                    ])
                    ->using(function (array $data): Model {
                        $this->ownerRecord->child_items()->sync($data['item_id'], false);
                        return $this->ownerRecord;
                    }),


            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
