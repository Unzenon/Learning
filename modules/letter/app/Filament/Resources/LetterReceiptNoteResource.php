<?php

namespace Venture\Letter\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Venture\Letter\Models\LetterReceiptNote;
use Venture\Letter\Filament\Resources\LetterReceiptNoteResource\Pages;
use Venture\Letter\Filament\Resources\LetterReceiptNoteResource\InitializeTableColumns;
use Venture\Letter\Filament\Resources\LetterReceiptNoteResource\InitializeFormSchema;

class LetterReceiptNoteResource extends Resource
{
    protected static ?string $model = LetterReceiptNote::class;

    protected static ?string $navigationLabel = 'Tanda Terima'; // Nama di sidebar

    protected static ?string $modelLabel = 'Tanda Terima'; // singular

    protected static ?string $pluralModelLabel = 'Daftar Tanda Terima'; // plural

    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';

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
            'index' => Pages\ListLetterReceiptNotes::route('/'),
            'create' => Pages\CreateLetterReceiptNote::route('/create'),
            'edit' => Pages\EditLetterReceiptNote::route('/{record}/edit'),
        ];
    }
}
