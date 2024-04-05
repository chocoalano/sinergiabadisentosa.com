<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Config Application')
                    ->icon('heroicon-s-wrench-screwdriver')
                    ->collapsed(true),
                NavigationGroup::make()
                    ->label('Master Data')
                    ->icon('heroicon-s-table-cells')
                    ->collapsed(true),
                NavigationGroup::make()
                    ->label('Blogs')
                    ->icon('heroicon-s-arrow-up-on-square-stack')
                    ->collapsed(true),
                NavigationGroup::make()
                    ->label('Services')
                    ->icon('heroicon-s-check-badge')
                    ->collapsed(true),
            ]);
        });
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');
    }
}
