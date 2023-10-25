<?php


namespace App\Http\Traits;


use Carbon\Carbon;

trait GetMonthsArray
{
    public function getMonthsArray($months = 12): array
    {
        $MonthsArray = [];

        for ($i = 0; $i <= $months; $i++) {
            $carbonNow = Carbon::now();
            $date = $carbonNow->subMonths($i);
            $month = $date->month;
            $monthName = $date->shortMonthName;
            $year = $date->year;

            $MonthsArray[] = (object) [
                'month' => $month,
                'year' => $year,
                'monthName' => $monthName
            ];
        }

        return array_reverse($MonthsArray);
    }
}
