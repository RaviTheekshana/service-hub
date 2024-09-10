<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\Booking;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('The total number of users in the system.')
                ->descriptionIcon('heroicon-o-users')
                ->icon('heroicon-o-users')
                ->chart([1,3,5,9,20,50,75,100])
                ->color('success'),

            Stat::make('Total Bookings', Booking::count())
                ->description('The total number of bookings in the system.')
                ->descriptionIcon('heroicon-o-calendar')
                ->icon('heroicon-o-calendar')
                ->chart([1,3,20,39,40,50,75,100])
                ->color('danger'),
            Stat::make('Job Post', BlogPost::count())
                ->description('The total number of job posts in the system.')
                ->descriptionIcon('heroicon-o-briefcase')
                ->icon('heroicon-o-briefcase')
                ->chart([1,20,30,100,80,25,50,75])
                ->color('primary'),
        ];
    }
}
