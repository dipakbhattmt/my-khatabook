<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ActivityService
{

    private static function getActivityQuery($month, $year, $day = null)
    {
        $query = Auth::user()->activity()
            ->whereMonth('paid_at', $month)
            ->whereYear('paid_at', $year);

        if ($day !== null) {
            $query->whereDay('paid_at', $day);
        }

        return $query;
    }

    private static function mapGroupedActivities($groupedActivities): array
    {
        $sum = $groupedActivities->sum('amount');

        return [
            'type_name' => $groupedActivities->first()->type->name,
            'total_amount' => $sum,
            'activities' => $groupedActivities->toArray()
        ];
    }

    public static function byMonth($month, $year)
    {
        return self::getActivityQuery($month, $year)
            ->get()
            ->groupBy('type.name')
            ->map(function ($groupedActivities) {
                return self::mapGroupedActivities($groupedActivities);
            })
            ->values()
            ->toArray();
    }

    public static function byDay($month, $year, $day)
    {
        return self::getActivityQuery($month, $year, $day)
            ->get()
            ->groupBy('type.name')
            ->map(function ($groupedActivities) {
                return self::mapGroupedActivities($groupedActivities);
            })
            ->values()
            ->toArray();
    }

    public static function getIncome($month, $year)
    {
        return Auth::user()->income()
            ->whereMonth('income_date', $month)
            ->whereYear('income_date', $year);
    }

    /**
     * @param int $monthsAgo
     * @return array
     *
     * Will return expenses and income for the previous provided months. default is for past 6 months.
     */
    public static function sumExpensesAndIncome(int $monthsAgo = 6): array
    {
        $results = ["months" => [], "expenses" => [], "income" => []];
        for ($i = 0; $i < $monthsAgo; $i++) {
            $currentDate = Carbon::now();
            $date = $currentDate->subMonths($i + 1);

            $expenses = self::getActivityQuery($date->month, $date->year)->sum('amount');
            $income = self::getIncome($date->month, $date->year)->sum('amount');

            $results['months'][] = $date->shortMonthName;
            $results['expenses'][] = $expenses;
            $results['income'][] = $income;
        }

        return $results;
    }
}
