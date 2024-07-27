<?php

namespace App\Filament\Resources\Profile_ManagementResource\Pages;

use App\Filament\Resources\Profile_ManagementResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditProfile_Management extends EditRecord
{
    protected static string $resource = Profile_ManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
