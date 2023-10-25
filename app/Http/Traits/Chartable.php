<?php


namespace App\Http\Traits;


use App\Activity;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

trait Chartable
{

    public function buildChartData($type, $year): array
    {

        $paymentAmountArray = [];
        for ($i = 1; $i <= 12; $i++) {
            $amount = Activity::where('type_id', $type->id)
                ->where('user_id', Auth::id())
                ->whereMonth('paid_at', $i)
                ->whereYear('paid_at', $year)
                ->pluck('amount');

            $amountZero = count($amount);
            $paymentAmountArray[] = $amountZero != 0 ? $amount->sum() : $amountZero;
        }
        return Arr::flatten($paymentAmountArray);
    }
}
