<?php
namespace App\Filament\Widgets;

use App\Enums\RegistrationStatusEnum;
use App\Enums\SessionStatusEnum;
use App\Models\AdultSession;
use App\Models\Registration;
use App\Models\ProgramSession;
use App\Models\Payment;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DailyStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalSeats   = AdultSession::whereNotIn('status', [
                            SessionStatusEnum::Cancelled,
                            SessionStatusEnum::Completed,
                        ])
                        ->sum('capacity');

        $usedSeats    = Registration::whereNotNull('paid_at')
                        ->whereNotIn('status', [
                            RegistrationStatusEnum::Cancelled,
                            RegistrationStatusEnum::Completed,
                        ])
                        ->count(); 

        $pendingRequests = Registration::where('status', RegistrationStatusEnum::Pending)
                        ->wherenull('paid_at')
                        ->count();

        $today = Carbon::today();
        $todaysRevenue = Registration::whereDate('paid_at', $today)
                        ->sum('price');

        $newToday = Registration::whereDate('created_at', $today)->count();

        return [
            Stat::make('نسبة الإشغال', "{$usedSeats} من {$totalSeats} مقعد")
                ->description('إجمالي المقاعد المستخدمة'),

            Stat::make('طلبات قيد المراجعة', $pendingRequests)
                ->description('يتطلب إجراء'),

            Stat::make('إيرادات اليوم (ريال)', number_format($todaysRevenue))
                ->description('مقارنة باليوم السابق'),

            Stat::make('مشتركين جدد اليوم', $newToday)
                ->description('التغيير عن أمس'),
        ];
    }
}
