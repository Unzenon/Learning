<?php

namespace Venture\Letter\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Venture\Letter\Models\LetterReceipt;
use Venture\Letter\Filament\Resources\LetterReceiptResource\Pages;
use Venture\Letter\Filament\Resources\LetterReceiptResource\InitializeFormSchema;
use Venture\Letter\Filament\Resources\LetterReceiptResource\InitializeTableColumns;


class LetterReceiptResource extends Resource
{
    protected static ?string $model = LetterReceipt::class;

    protected static ?string $navigationLabel = 'Kwitansi'; // Nama di sidebar

    protected static ?string $modelLabel = 'Kwitansi'; // singular

    protected static ?string $pluralModelLabel = 'Daftar Kwitansi'; // plural

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return InitializeFormSchema::run($form);
    }

    public static function table(Table $table): Table
    {
        return InitializeTableColumns::run($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLetterReceipts::route('/'),
            'create' => Pages\CreateLetterReceipt::route('/create'),
            'edit' => Pages\EditLetterReceipt::route('/{record}/edit'),
        ];
    }
}
