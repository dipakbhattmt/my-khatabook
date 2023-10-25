<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Traits\GetMonthsArray;
use App\Services\ActivityService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use JavaScript;

class HomeController extends Controller
{
    use GetMonthsArray;

    /**
     * Show the application homepage.
     *
     * @return Factory|View
     */
    public function index(): Factory|View
    {
        if (Auth::check()) {
            $user = Auth::user();
            $homepageData = ActivityService::byMonth(Carbon::now()->month, Carbon::now()->year);

            JavaScript::put([
                'emptyNotes' =>  __('general.no-notes'),
                'colors' => Helper::generateHexColorArray(count(array_column($homepageData, 'type_name'))),
                'types' => array_column($homepageData, 'type_name'),
                'paid' => array_column($homepageData, 'total_amount'),
                'pastSixMonthsData' => ActivityService::sumExpensesAndIncome()
            ]);

            $currentMonthBudget = $user->budget()->value('budget');
            $totalExpensesThisMonth = $user->activity()->whereMonth('paid_at', Carbon::now()->month)->sum('amount');
            $budgetStatus = number_format(($totalExpensesThisMonth / $currentMonthBudget) * 100, 2);

            return view('home', compact('budgetStatus', 'currentMonthBudget', 'totalExpensesThisMonth'));
        }

        return view('home');
    }
}
