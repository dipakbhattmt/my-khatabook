<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BudgetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(): Factory|View
    {

        $month = Carbon::now();
        $currentMonthBudget = Arr::first( Auth::user()->budget()->pluck('budget'));
        $totalExpensesThisMonth = Auth::user()->activity()->whereMonth('paid_at', $month->month)->sum('amount');
        $budgetStatus = $currentMonthBudget - $totalExpensesThisMonth;

        $budgetInfo = (object)[
            "forMonth" => $month->monthName,
            "currentMonthBudget" => $currentMonthBudget,
            "totalExpensesThisMonth" => $totalExpensesThisMonth,
            "budgetStatus" => $budgetStatus
        ];


        return view('budget.index', compact('budgetInfo'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $attr = $request->validate(['budget' => 'required|numeric|min:1|max:1000000']);
        Budget::updateOrCreate(['user_id' => Auth::id()], $attr);
        return back()->with('flash', __('general.setup-new-user.budget.created'));
    }

}
