<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalPosition;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OrganizationalPositionController extends Controller
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
        $data = OrganizationalPosition::latest()->paginate(5);
        return view('organizational_positions.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('organizational_positions.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:organizational_positions,name',
        ]);

        $input = $request->all();
        OrganizationalPosition::create($input);

        return redirect()->route('organizational-positions.index')->with([
            'message' => 'Organizational Position created successfully!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganizationalPosition $organizationalPosition)
    {
        return view('organizational_positions.show', compact('organizationalPosition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrganizationalPosition $organizationalPosition)
    {
        return view('organizational_positions.form', compact('organizationalPosition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrganizationalPosition $organizationalPosition)
    {
        $this->validate($request, [
            'name' => 'required|unique:organizational_positions,name,' . $organizationalPosition->id,
        ]);

        $organizationalPosition->update($request->all());

        return redirect()->route('organizational-positions.index')->with('message', 'Organizational Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganizationalPosition $organizationalPosition)
    {
        $organizationalPosition->delete();
        return redirect()->route('organizational-positions.index')->with('message', 'Organizational Position deleted successfully');
    }
}
