<?php

namespace Venture\Letter\Filament\Resources\LetterReceiptResource;

use Filament\Tables\Table;
use Filament\Tables\Actions\Action as TableAction;
use Lorisleiva\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Venture\Letter\Models\LetterReceipt;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class InitializeTableColumns extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-receipt/table';

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

            TextColumn::make('received_from')
                ->label("{$this->langPre}.columns.received_from.label")
                ->searchable()
                ->translateLabel(),

            TextColumn::make('amount')
                ->label("{$this->langPre}.columns.amount.label")
                ->money('IDR', true)
                ->translateLabel(),

            TextColumn::make('payment_for')
                ->label("{$this->langPre}.columns.payment_for.label")
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
                TableAction::make('preview')
                    ->label("{$this->langPre}.columns.preview.label")
                    ->icon('heroicon-o-eye')
                    ->url(fn(LetterReceipt $record) => route('@letter.letter.receipts.preview_receipt', $record))
                    ->openUrlInNewTab()
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultPaginationPageOption(25);
    }
}
