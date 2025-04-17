<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:GRUP_USER_LIST|GRUP_USER_ADD|GRUP_USER_EDIT|GRUP_USER_DELETE', ['only' => ['index', 'store']]);
        $this->middleware('permission:GRUP_USER_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:GRUP_USER_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:GRUP_USER_DELETE', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 20;
        
        $query = Role::query();
        
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
        
        return view('admin.pages.roles.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = Permission::get();

        return view('admin.pages.roles.form', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('mindo.roles.index')->with('message', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")->where("role_has_permissions.role_id", $id)->get();

        return view('admin.pages.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.pages.roles.form', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('mindo.roles.index')->with('message', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $test = DB::table("roles")->where('id', $id)->first();
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('mindo.roles.index')->with('message', 'Role deleted successfully');
    }
}
