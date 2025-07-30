<?php

namespace Venture\Letter\Filament\Resources\TandaTerimaResource;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Lorisleiva\Actions\Action;

class InitializeTableColumns extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-receipt/table';

    protected function getTableColumns(): array
    {
        return [

            TextColumn::make('id')
                ->prefix('#')
                ->label("{$this->langPre}.columns.id.label")
                ->translateLabel(),

            TextColumn::make('received_from')
                ->label("{$this->langPre}.columns.received_from.label")
                ->translateLabel(),

        ];
    }

    public function handle(Table $table): Table
    {
        return $table
            ->columns($this->getTableColumns())
            ->filters([
                //
            ])
            ->actions([
                // ViewAction::make(),
                // SendForApprovalActions::make(),

                EditAction::make(),
                //     ->visible(function (Model $record) {
                //         return Collection::make($record->state->transitionableStates())
                //             ->contains(SentForApproval::class);
                //     }),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultPaginationPageOption(25);
    }
}
