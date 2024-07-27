<?php

namespace App\Filament\Resources\Profile_ManagementResource\Pages;

use App\Filament\Resources\Profile_ManagementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProfile_Management extends CreateRecord
{
    protected static string $resource = Profile_ManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
