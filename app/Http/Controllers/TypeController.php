<?php

namespace App\Http\Controllers;


use App\Activity;
use App\Type;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use JavaScript;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Response;
use App\Http\Traits\Chartable;
use App\Http\Traits\GetMonthsArray;
use App\Http\Requests\StoreType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Auth\Access\AuthorizationException;

class TypeController extends Controller
{

    use Chartable, GetMonthsArray;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(): Factory|View
    {
        $types = Type::with('activity')->get();


        return view('types.index', compact('types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create(): Factory|View
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param StoreType $request
     * @return RedirectResponse
     */
    public function store(StoreType $request): RedirectResponse
    {

        $attributes = $request->validated();

        Type::create($attributes + ['user_id' => Auth::id()]);
        return back()->with('flash', 'התגית נוצרה בהצלחה');
    }

    /**
     * Display the specified resource.
     *
     * @param Type $type
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function show(Type $type): Factory|View
    {
        $year = Carbon::now()->year;
        $currentMonthTypeActivitiesList = $type->activity()->get();
        $this->authorize('view', $type);
        $subMonthesArray = $this->getMonthsArray();
        $chartData = $this->buildChartData($type, $year);

        JavaScript::put([
            "amounts" => Arr::flatten($chartData),
            "subMonthes" => $subMonthesArray,
            "nameOfChart" => $type->name,
            'typeActivitiesList' => $currentMonthTypeActivitiesList,
            'type' => $type->name,
            'paymentsListTranslations' => __('general.payments-list'),
            'monthsArray' => Auth::user()->locale == 'he' ? config('settings.months.hebrew') : config('settings.months.english'),
            'paidThisYear' => __('general.paidThisYear')
        ]);


        return view('types.show', compact('type'));
    }


    public function update($typeId)
    {
        $type = Type::find($typeId);
        $chartData = $this->buildChartData($type, request()->month);
        if (request()->expectsJson()) {
            return ["amounts" => Arr::flatten($chartData)];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Type $type
     * @return string
     */
    public function destroy(Type $type): string
    {

        $type->delete();
        if (request()->expectsJson()) {
            return __('general.type-deleted');
        }

        return __('general.problem-deleting-type');
    }

    public function getDataForAnotherPeriod()
    {

        return Activity::where('type_id', request()->type_id)
            ->where('user_id', Auth::id())
            ->whereMonth('paid_at', request()->month)
            ->whereYear('paid_at', request()->year)
            ->get();
    }

}
