<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return Activity::with('type')
            ->where('info', 'LIKE', '%' . $request->q . '%')
            ->where('user_id', Auth::id())
            ->get(['amount', 'id', 'info', 'type_id']);
    }
}
