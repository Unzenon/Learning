<?php

namespace Venture\Letter\Filament\Resources\LetterReceiptNoteResource;

use Filament\Forms\Get;
use Filament\Forms\Form;
use Lorisleiva\Actions\Action;
use Venture\Inventory\Models\Item;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;

class InitializeFormSchema extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-receipt-note/form';

    protected function getFormFields(): array
    {
        return [
            Section::make()->schema([
                // Baris 1
                Grid::make(3)->schema([
                    DatePicker::make('date')
                        ->label("{$this->langPre}.fields.date.label")
                        ->icon()
                        ->closeOnDateSelection()
                        ->native(false)
                        ->date()
                        ->required()
                        ->translateLabel(),

                    TextInput::make('day')
                        ->label("{$this->langPre}.fields.day.label")
                        ->required()
                        ->translateLabel(),

                    Select::make('from')
                        ->label("{$this->langPre}.fields.from.label")
                        ->options([
                            'PT Lintas Bahari Nusantara' => 'PT Lintas Bahari Nusantara',
                            'PT Lintas Armada Indonesia' => 'PT Lintas Armada Indonesia',
                        ])
                        ->required()
                        ->translateLabel(),
                ]),

                // Baris 2
                Grid::make(2)->schema([
                    TextInput::make('to')
                        ->label("{$this->langPre}.fields.to.label")
                        ->required()
                        ->translateLabel(),

                    Textarea::make('notes')
                        ->label("{$this->langPre}.fields.notes.label")
                        ->rows(3)
                        ->required()
                        ->translateLabel(),
                ]),

                // Baris 3
                Repeater::make('entries')
                    ->label("{$this->langPre}.fields.entries.label")
                    ->relationship()
                    ->schema([
                        Grid::make(2)->schema([
                            DatePicker::make('invoice_date')->label('Tanggal Invoice')->required(),
                            TextInput::make('invoice_number')->label('No Invoice')->required(),
                            TextInput::make('amount')->label('Nominal')->numeric()->required(),
                            TextInput::make('description')->label('Keterangan')->required(),
                        ]),
                    ])
                    ->defaultItems(1)
                    ->collapsible()
                    ->deletable(true),
            ]),
        ];
    }

    public function handle(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema($this->getFormFields()),
        ]);
    }
}
