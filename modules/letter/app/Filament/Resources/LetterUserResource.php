<?php

namespace Venture\Letter\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Venture\Home\Models\User;
use Filament\Resources\Resource;
use Venture\Letter\Filament\Resources\LetterUserResource\Pages;
use Venture\Letter\Filament\Resources\LetterUserResource\InitializeFormSchema;
use Venture\Letter\Filament\Resources\LetterUserResource\Pages\EditLetterUser;
use Venture\Letter\Filament\Resources\LetterUserResource\Pages\ListLetterUsers;
use Venture\Letter\Filament\Resources\LetterUserResource\InitializeTableColumns;
use Venture\Letter\Filament\Resources\LetterUserResource\Pages\CreateLetterUser;

class LetterUserResource extends Resource
{
    protected static ?string $model = User::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Peran dan Izin';
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-user';
    }

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
            'index' => Pages\ListLetterUsers::route('/'),
            'create' => Pages\CreateLetterUser::route('/create'),
            'edit' => Pages\EditLetterUser::route('/{record}/edit'),
        ];
    }
}
