<?php

namespace App\Http\Controllers;

use App\Services\ActivityService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MonthlyActivityController extends Controller
{
    public function index($month, $year): Factory|View|Application
    {
        $activities = ActivityService::byMonth($month, $year);
        $general =  __('general');
        return view('activities.this-month', compact('activities', 'general'));
    }
}
