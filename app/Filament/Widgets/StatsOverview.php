<?php

namespace App\Filament\Widgets;

use App\Models\ContactEnquiry;
use App\Models\Enquiry;
use App\Models\Partner;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Enquiries', Enquiry::count())
                ->description($this->getEnquiryTrend())
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success')
                ->chart($this->getEnquiryChartData()),

            Stat::make('Contact Enquiries', ContactEnquiry::count())
                ->description($this->getContactEnquiryTrend())
                ->descriptionIcon('heroicon-o-envelope')
                ->color('info')
                ->chart($this->getContactEnquiryChartData()),

            Stat::make('Active Services', Service::where('status', true)->count())
                ->description('Published services')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('warning'),

            Stat::make('Active Partners', Partner::where('status', true)->count())
                ->description('Published partners')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('primary'),
        ];
    }

    protected function getEnquiryTrend(): string
    {
        $lastWeek = Enquiry::where('created_at', '>=', now()->subWeek())->count();
        $previousWeek = Enquiry::whereBetween('created_at', [now()->subWeeks(2), now()->subWeek()])->count();

        if ($previousWeek === 0) {
            return "{$lastWeek} this week";
        }

        $percentChange = round((($lastWeek - $previousWeek) / $previousWeek) * 100);

        return $percentChange > 0 ? "+{$percentChange}% from last week" : "{$percentChange}% from last week";
    }

    protected function getContactEnquiryTrend(): string
    {
        $lastWeek = ContactEnquiry::where('created_at', '>=', now()->subWeek())->count();
        $previousWeek = ContactEnquiry::whereBetween('created_at', [now()->subWeeks(2), now()->subWeek()])->count();

        if ($previousWeek === 0) {
            return "{$lastWeek} this week";
        }

        $percentChange = round((($lastWeek - $previousWeek) / $previousWeek) * 100);

        return $percentChange > 0 ? "+{$percentChange}% from last week" : "{$percentChange}% from last week";
    }

    protected function getEnquiryChartData(): array
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $data[] = Enquiry::whereDate('created_at', now()->subDays($i))->count();
        }

        return $data;
    }

    protected function getContactEnquiryChartData(): array
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $data[] = ContactEnquiry::whereDate('created_at', now()->subDays($i))->count();
        }

        return $data;
    }
}
