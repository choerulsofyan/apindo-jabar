<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:KEGIATAN_LIST|KEGIATAN_ADD|KEGIATAN_EDIT|KEGIATAN_DELETE', ['only' => ['index', 'show']]);
        $this->middleware('permission:KEGIATAN_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:KEGIATAN_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:KEGIATAN_DELETE', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 20;

        $query = Activity::query();

        // Search by title 
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            });
        }

        // Sort by title (default) or email
        $sortBy = $request->input('sort_by', 'title'); // Default sort by title
        $sortOrder = $request->input('sort_order', 'asc'); // Default sort order

        if (!in_array($sortBy, ['title'])) {
            $sortBy = 'title'; // Default sort column if invalid value is provided
        }

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc'; // Default sort order if invalid value is provided
        }

        $query->orderBy($sortBy, $sortOrder);

        $activities = $query->paginate($perPage);

        return view('admin.pages.activities.index', compact('activities'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.activities.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after:start_time', // Validate end_time is after start_time
            'place' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);


        Activity::create($request->all());

        return redirect()->route('mindo.activities.index')
            ->with('success', 'Activity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity): View
    {
        return view('admin.pages.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity): View
    {
        return view('admin.pages.activities.form', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after:start_time',
            'place' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $activity->update($request->all());

        return redirect()->route('mindo.activities.index')
            ->with('success', 'Activity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();

        return redirect()->route('mindo.activities.index')
            ->with('success', 'Activity deleted successfully');
    }
}
