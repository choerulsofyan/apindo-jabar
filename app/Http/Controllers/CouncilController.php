<?php

namespace App\Http\Controllers;

use App\Models\Council;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CouncilController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:DEWAN_LIST|DEWAN_ADD|DEWAN_EDIT|DEWAN_DELETE', ['only' => ['index', 'show']]);
        $this->middleware('permission:DEWAN_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:DEWAN_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:DEWAN_DELETE', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 20;

        $query = Council::query();

        // Search by name 
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        // Sort by name (default) or email
        $sortBy = $request->input('sort_by', 'name'); // Default sort by name
        $sortOrder = $request->input('sort_order', 'asc'); // Default sort order

        if (!in_array($sortBy, ['name'])) {
            $sortBy = 'name'; // Default sort column if invalid value is provided
        }

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc'; // Default sort order if invalid value is provided
        }

        $query->orderBy($sortBy, $sortOrder);

        $data = $query->paginate($perPage);

        return view('admin.pages.councils.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.councils.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:councils,name',
        ]);

        $input = $request->all();
        Council::create($input);

        return redirect()->route('mindo.councils.index')->with([
            'message' => 'Council created successfully!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Council $council): View
    {
        return view('admin.pages.councils.show', compact('council'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Council $council): View
    {
        return view('admin.pages.councils.form', compact('council'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Council $council): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:councils,name,' . $council->id,
        ]);

        $council->update($request->all());

        return redirect()->route('mindo.councils.index')->with('message', 'Council updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Council $council): RedirectResponse
    {
        $council->delete();
        return redirect()->route('mindo.councils.index')->with('message', 'Council deleted successfully');
    }
}
