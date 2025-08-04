<?php

namespace Venture\Letter\Filament\Resources;

use Filament\Resources\Resource;
use Venture\Letter\Models\LetterRole;
use Venture\Letter\Filament\Resources\LetterRoleResource\Pages;

class LetterRoleResource extends Resource
{
    protected static ?string $model =  LetterRole::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Peran dan Izin';
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-shield-exclamation';
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
            'index' => Pages\ListLetterRoles::route('/'),
            'create' => Pages\CreateLetterRole::route('/create'),
            'edit' => Pages\EditLetterRole::route('/{record}/edit'),
        ];
    }
}
