<?php

namespace App\Filament\Resources\Services\PrivacyPolicyResource\Pages;

use App\Filament\Resources\Services\PrivacyPolicyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrivacyPolicies extends ListRecords
{
    protected static string $resource = PrivacyPolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
