<?php

namespace Venture\Letter\Filament\Resources\LetterUserResource;

use Filament\Forms\Form;
use Venture\Home\Models\User;
use Lorisleiva\Actions\Action;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;

class InitializeFormSchema extends Action
{
    protected string $langPre = 'letter::filament/resources/letter-user/form';

    protected function getFormFields(): array
    {
        return [
            Section::make()
                ->schema([
                    Grid::make(3)->schema([
                        TextInput::make('name')
                            ->label("{$this->langPre}.fields.name.label")
                            ->required()
                            ->translateLabel(),

                        TextInput::make('email')
                            ->label("{$this->langPre}.fields.email.label")
                            ->email()
                            ->required()
                            ->translateLabel(),

                        TextInput::make('password')
                            ->label("{$this->langPre}.fields.password.label")
                            ->required(fn(string $context) => $context === 'create')
                            ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->translateLabel(),
                    ]),

                    Grid::make(2)->schema([
                        Select::make('roles')
                            ->label("{$this->langPre}.fields.roles.label")
                            ->relationship('roles', 'name')
                            ->preload()
                            ->searchable()
                            ->native(false)
                            ->required()
                            ->translateLabel(),

                        Select::make('permissions')
                            ->label("{$this->langPre}.fields.permissions.label")
                            ->relationship('permissions', 'name')
                            ->preload()
                            ->searchable()
                            ->native(false)
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
