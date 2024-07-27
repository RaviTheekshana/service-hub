<?php

namespace App\Filament\Resources\Profile_ManagementResource\Pages;

use App\Filament\Resources\Profile_ManagementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfile_Managements extends ListRecords
{
    protected static string $resource = Profile_ManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
