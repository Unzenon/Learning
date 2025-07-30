<?php

namespace Venture\Letter\Filament\Resources\TandaTerimaResource;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Lorisleiva\Actions\Action;
use Venture\Inventory\Models\Item;

class InitializeFormSchema extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-receipt/form';

    protected function getFormFields(): array
    {
        return [
            Section::make()
                ->schema([
                    DatePicker::make('date')
                        ->label("{$this->langPre}.fields.date.label")
                        ->translateLabel()
                        ->icon()
                        ->closeOnDateSelection()
                        ->native(false)
                        ->date(),

                    TextInput::make('received_from')
                        ->label("{$this->langPre}.fields.received_from.label")
                        ->translateLabel()

                ])
        ];
    }

    public function handle(Form $form): Form
    {
        return $form->schema([
            Section::make()->schema($this->getFormFields()),
        ]);
    }
}
