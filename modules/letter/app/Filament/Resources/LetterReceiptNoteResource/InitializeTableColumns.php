<?php

namespace Venture\Letter\Filament\Resources\LetterReceiptNoteResource;

use Filament\Tables\Table;
use Lorisleiva\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Venture\Letter\Filament\Resources\LetterReceiptNoteResource\Actions\PreviewAction;

class InitializeTableColumns extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-receipt-note/table';

    protected function getTableColumns(): array
    {
        return [

            TextColumn::make('id')
                ->label("{$this->langPre}.columns.id.label")
                ->translateLabel(),

            TextColumn::make('date')
                ->label("{$this->langPre}.columns.date.label")
                ->date()
                ->translateLabel(),

            TextColumn::make('day')
                ->label("{$this->langPre}.columns.day.label")
                ->searchable()
                ->translateLabel(),

            TextColumn::make('from')
                ->label("{$this->langPre}.columns.from.label")
                ->money('IDR', true)
                ->translateLabel(),

            TextColumn::make('to')
                ->label("{$this->langPre}.columns.to.label")
                ->searchable()
                ->translateLabel(),

            TextColumn::make('notes')
                ->label("{$this->langPre}.columns.notes.label")
                ->searchable()
                ->translateLabel(),

            TextColumn::make('user.name')
                ->label("{$this->langPre}.columns.created_by.label")
                ->searchable()
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
                EditAction::make(),
                DeleteAction::make(),
                PreviewAction::make(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultPaginationPageOption(25);
    }
}
