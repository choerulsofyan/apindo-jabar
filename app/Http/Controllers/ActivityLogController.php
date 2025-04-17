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
        
        $query = Activity::with('causer', 'subject'); // Eager load relationships
        
        // Search by log_name, description, or causer name
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('log_name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('causer', function ($query) use ($search) {
                      $query->where('name', 'like', '%' . $search . '%');
                  });
            });
        }
        
        // Sort by column (default: created_at desc)
        $sortBy = $request->input('sort_by', 'created_at'); // Default sort by created_at
        $sortOrder = $request->input('sort_order', 'desc'); // Default sort order is descending
        
        // Validate sort column
        if (!in_array($sortBy, ['log_name', 'description', 'created_at'])) {
            $sortBy = 'created_at'; // Default sort column if invalid value is provided
        }
        
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'desc'; // Default sort order if invalid value is provided
        }
        
        $query->orderBy($sortBy, $sortOrder);
        
        $activities = $query->paginate($perPage);
        
        return view('admin.pages.activity_logs.index', compact('activities'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    public function show(Activity $activity): View
    {
        return view('admin.pages.activity_logs.show', compact('activity'));
    }
}
