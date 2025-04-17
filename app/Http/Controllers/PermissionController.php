<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:HAK_AKSES_LIST|HAK_AKSES_ADD|HAK_AKSES_EDIT|HAK_AKSES_DELETE', ['only' => ['index', 'store']]);
        $this->middleware('permission:HAK_AKSES_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:HAK_AKSES_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:HAK_AKSES_DELETE', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 20;
        
        $query = Permission::query();
        
        // Search by name
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        
        // Sort by name
        $sortBy = 'name'; // Default sort by name
        $sortOrder = $request->input('sort_order', 'asc'); // Default sort order
        
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc'; // Default sort order if invalid value is provided
        }
        
        $query->orderBy($sortBy, $sortOrder);
        
        $data = $query->paginate($perPage);
        
        return view('admin.pages.permissions.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.permissions.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $input = $request->all();
        $permission = Permission::create($input);

        return redirect()->route('mindo.permissions.index')->with([
            'message' => 'Permission created successfully!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $permission = Permission::find($id);
        return view('admin.pages.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $permission = Permission::find($id);

        return view('admin.pages.permissions.form', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        $input = $request->all();
        $permission = Permission::find($id);
        $permission->update($input);

        return redirect()->route('mindo.permissions.index')->with([
            'message' => 'Permission updated successfully!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Permission::find($id)->delete();
        return redirect()->route('mindo.permissions.index')->with([
            'message' => 'Permission deleted successfully!',
            'alert-type' => 'success'
        ]);
    }
}
