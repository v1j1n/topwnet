<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\RecentContactEnquiries;
use App\Filament\Widgets\RecentEnquiries;
use App\Filament\Widgets\StatsOverview;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            RecentEnquiries::class,
            RecentContactEnquiries::class,
        ];
    }

    public function getColumns(): int|array
    {
        return 1;
    }
}
