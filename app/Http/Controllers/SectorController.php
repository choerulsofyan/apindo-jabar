<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SectorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:JABATAN_LIST|JABATAN_ADD|JABATAN_EDIT|JABATAN_DELETE', ['only' => ['index', 'show']]);
        $this->middleware('permission:JABATAN_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:JABATAN_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:JABATAN_DELETE', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 20;
        $data = Sector::orderBy('name', 'asc')->paginate($perPage);
        return view('admin.pages.sectors.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.sectors.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:sectors,name',
        ]);

        $input = $request->all();
        Sector::create($input);

        return redirect()->route('sectors.index')->with([
            'message' => 'Sector created successfully!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sector $sector)
    {
        return view('admin.pages.sectors.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        return view('admin.pages.sectors.form', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $sector)
    {
        $this->validate($request, [
            'name' => 'required|unique:sectors,name,' . $sector->id,
        ]);

        $sector->update($request->all());

        return redirect()->route('sectors.index')->with('message', 'Sector updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        $sector->delete();
        return redirect()->route('sectors.index')->with('message', 'Sector deleted successfully');
    }
}
