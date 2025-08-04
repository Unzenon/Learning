<?php

namespace Venture\Letter\Filament\Resources\LetterReceiptResource;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Lorisleiva\Actions\Action;

class InitializeFormSchema extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-receipt/form';

    protected function getFormFields(): array
    {
        return [
            Section::make()
                ->schema([
                    Grid::make(4)->schema([
                        DatePicker::make('date')
                            ->label("{$this->langPre}.fields.date.label")
                            ->icon()
                            ->closeOnDateSelection()
                            ->native(false)
                            ->date()
                            ->required()
                            ->translateLabel(),

                        TextInput::make('received_from')
                            ->label("{$this->langPre}.fields.received_from.label")
                            ->required()
                            ->translateLabel(),

                        TextInput::make('amount')
                            ->label("{$this->langPre}.fields.amount.label")
                            ->numeric()
                            ->prefix('Rp')
                            ->required()
                            ->translateLabel(),

                        TextInput::make('payment_for')
                            ->label("{$this->langPre}.fields.payment_for.label")
                            ->required()
                            ->translateLabel(),
                    ]),
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
