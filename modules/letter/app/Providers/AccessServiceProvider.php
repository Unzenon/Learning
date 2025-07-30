<?php

namespace Venture\Letter\Providers;

use Illuminate\Support\ServiceProvider;
use Venture\Aeon\Enums\ModulesEnum;
use Venture\Aeon\Support\Facades\Access;
use Venture\Letter\Enums\Auth\PermissionsEnum;
use Venture\Letter\Enums\Auth\RolesEnum;
use Venture\Letter\Filament\Pages\Dashboard;

class AccessServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Access::addPermissions(PermissionsEnum::all());
        Access::addRoles(RolesEnum::all());
        Access::addAdministratorRole(RolesEnum::ADMINISTRATOR);
        Access::addEntryPage(Dashboard::class, [
            'route' => 'filament.letter.pages.dashboard',
            'name' => ModulesEnum::LETTER->name(),
            'slug' => ModulesEnum::LETTER->slug(),
            'icon' => ModulesEnum::LETTER->icon(),
        ]);
    }
}
