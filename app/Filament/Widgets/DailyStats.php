<?php
namespace App\Filament\Widgets;

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
        $totalSeats   = 160;              // ProgramSession::sum('capacity') ?? 160
        $usedSeats    = Registration::where('status', 'paid')->count(); // 142

        $pendingRequests = Registration::where('status', 'pending')->count();

        $today = Carbon::today();
        $todaysRevenue = 1000;
        // Payment::whereDate('paid_at', $today)
        //     ->where('status', 'paid')
        //     ->sum('amount');

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
