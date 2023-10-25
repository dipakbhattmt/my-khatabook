<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BudgetService
{
    public static function checkBalance()
    {
        $user = Auth::user();

        $currentMonthBudget = $user->budget->pluck('budget')->first();

        $totalExpensesThisMonth = $user->activity()
            ->whereMonth('paid_at', Carbon::now()->month)
            ->sum('amount');

        $balance = ($totalExpensesThisMonth / $currentMonthBudget) * 100;

        return [
            'balance' => $balance,
            'over' => $balance > 50,
        ];
    }
}
