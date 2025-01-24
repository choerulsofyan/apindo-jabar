<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\View\View;

class ActivityLogController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 20;
        $activities = Activity::with('causer', 'subject') // Eager load relationships
            ->latest()
            ->paginate($perPage);

        return view('activity_logs.index', compact('activities'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    public function show(Activity $activity): View
    {
        return view('activity_logs.show', compact('activity'));
    }
}
