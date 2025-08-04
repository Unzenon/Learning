<?php

namespace Venture\Letter\Filament\Resources;

use Venture\Letter\Filament\Resources\LetterPermissionResource\Pages;
use Venture\Letter\Models\LetterPermission;
use Filament\Resources\Resource;

class LetterPermissionResource extends Resource
{
    protected static ?string $model = LetterPermission::class;

    public static function getNavigationGroup(): ?string
    {
        return 'Peran dan Izin';
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-key';
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
            'index' => Pages\ListLetterPermissions::route('/'),
            'create' => Pages\CreateLetterPermission::route('/create'),
            'edit' => Pages\EditLetterPermission::route('/{record}/edit'),
        ];
    }
}
