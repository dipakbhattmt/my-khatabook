<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Method;
use App\Services\OneSignalService;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Http\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreActivity;
use Illuminate\Contracts\View\Factory;

class ActivityController extends Controller
{
    use UploadImage;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return integer
     */
    public function index(): int
    {
        $day = request('day');
        return Auth::user()->activityForDay($day)->pluck('amount')->sum();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create(): Factory|View
    {
        $methods = Method::all(['id', 'type', 'english_type']);
        $types = Auth::user()->type()->orderBy('name', 'asc')->get();
        return view('activities.create', compact('methods', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreActivity $request
     * @return RedirectResponse
     */
    public function store(StoreActivity $request): RedirectResponse
    {
        $requestImage = $request->file('image');
        $image = $requestImage ? $this->upload($requestImage) : null;

        $attributes = $request->validated();

        Activity::create(["user_id" => Auth::id()] + $attributes + ['image' => $image]);

        if (config('onesignal.is_active')) {
            OneSignalService::sendNotification($attributes);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Activity $activity
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function show(Activity $activity): Factory|View
    {
        $this->authorize('view', $activity);
        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Activity $activity
     * @return Factory|View
     */
    public function edit(Activity $activity): Factory|View
    {

        $methods = Method::all(['id', 'type', 'english_type']);
        return view('activities.edit', compact('activity', 'methods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreActivity $request
     * @param Activity $activity
     * @return string
     */
    public function update(StoreActivity $request, Activity $activity): string
    {
        $request->file('image') ? $image = $this->upload($request->file('image')) : $image = '';
        $attributes = $request->validated();
        $activity->update($attributes + ['image' => $image]);

        return route('activities.show', $activity);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Activity $activity
     * @return RedirectResponse|Redirector
     * @throws \Exception
     */
    public function destroy(Activity $activity): Redirector|RedirectResponse
    {
        $activity->delete();
        return redirect('/');
    }

    public function today(): Factory|\Illuminate\Contracts\View\View|Application
    {
        $day = Carbon::now()->day;
        $activities = Auth::user()->activityForDay($day);
        return view('activities.today', compact('activities'));
    }

}
