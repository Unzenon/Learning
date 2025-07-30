<?php

namespace Venture\Letter\Filament\Resources;

use Venture\Letter\Filament\Resources\TandaTerimaResource\Pages;
use Venture\Letter\Filament\Resources\TandaTerimaResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TandaTerimaResource extends Resource
{
    protected static ?string $model = \Venture\Letter\Models\TandaTerima::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return \Venture\Letter\Filament\Resources\TandaTerimaResource\InitializeFormSchema::run($form);
    }

    public static function table(Table $table): Table
    {
        return \Venture\Letter\Filament\Resources\TandaTerimaResource\InitializeTableColumns::run($table);
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
            'index' => Pages\ListTandaTerimas::route('/'),
            'create' => Pages\CreateTandaTerima::route('/create'),
            'edit' => Pages\EditTandaTerima::route('/{record}/edit'),
        ];
    }
}
