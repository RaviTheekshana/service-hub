<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\Booking;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BookingChart extends ChartWidget
{
    protected static ?string $heading = 'Booking Chart';

    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 2;

    protected function getData(): array
    {
        $data = Trend::model(Booking::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
        $job = Trend::model(BlogPost::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
        $user = Trend::model(User::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Bookings',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
                [
                    'label' => 'Job Post',
                    'data' => $job->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor'=> '#FF6384',
                    'backgroundColor'=> '#FFB1C1',
                ],
                [
                    'label' => 'Users',
                    'data' => $user->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor'=> '#FFCE56',
                    'backgroundColor'=> '#FFDB9B',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
