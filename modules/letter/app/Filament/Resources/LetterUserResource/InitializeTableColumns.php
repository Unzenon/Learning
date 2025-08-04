<?php

namespace Venture\Letter\Filament\Resources\LetterUserResource;

use Filament\Tables\Table;
use Filament\Tables\Actions\Action as TableAction;
use Lorisleiva\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Venture\Home\Models\User;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class InitializeTableColumns extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-user/table';

    protected function getTableColumns(): array
    {
        return [

            TextColumn::make('name')
                ->label("{$this->langPre}.columns.name.label")
                ->translateLabel(),

            TextColumn::make('email')
                ->label("{$this->langPre}.columns.email.label")
                ->getStateUsing(fn(User $record) => $record->emails()->where('is_primary', true)->value('value'))
                ->translateLabel(),

            TextColumn::make('password')
                ->label("{$this->langPre}.columns.password.label")
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
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultPaginationPageOption(25);
    }
}
