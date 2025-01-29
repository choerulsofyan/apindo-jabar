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
        $data = Council::orderBy('name', 'asc')->paginate($perPage);
        return view('admin.pages.councils.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $perPage);
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
