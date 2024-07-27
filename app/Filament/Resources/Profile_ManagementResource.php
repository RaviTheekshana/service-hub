<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Profile_ManagementResource\Pages;
use App\Models\Profile_Management;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Profile_ManagementResource extends Resource
{
    protected static ?string $model = Profile_Management::class;

    protected static ?string $slug = 'profile_-managements';

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('service_provider_id')
                    ->required()
                    ->integer(),

                TextInput::make('service_description')
                    ->required(),

                TextInput::make('work_details')
                    ->required(),
                FileUpload::make('project_images')
                    ->image()
                    ->directory('project_images')
                    ->multiple(),

                TextInput::make('experience_years')
                    ->required()
                    ->integer(),

                TextInput::make('hourly_rate')
                    ->required()
                    ->numeric(),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?Profile_Management $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?Profile_Management $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service_provider_id'),

                TextColumn::make('service_description'),

                TextColumn::make('work_details'),

                TextColumn::make('experience_years'),

                TextColumn::make('hourly_rate'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfile_Managements::route('/'),
            'create' => Pages\CreateProfile_Management::route('/create'),
            'edit' => Pages\EditProfile_Management::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
