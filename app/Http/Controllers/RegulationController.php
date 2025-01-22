<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class RegulationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:REGULASI_LIST|REGULASI_ADD|REGULASI_EDIT|REGULASI_DELETE', ['only' => ['index', 'show']]);
        $this->middleware('permission:REGULASI_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:REGULASI_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:REGULASI_DELETE', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 20;
        $data = Regulation::orderBy('title', 'asc')->paginate($perPage);
        return view('regulations.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $perPage);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $fileUrl = null;

        return view('regulations.form', compact('fileUrl'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'date'  => 'required|date',
            'file'  => 'required|mimes:pdf|max:2048', // Validate PDF file, max 2MB
        ]);

        $regulationData = [
            'title' => $request->title,
            'date'  => $request->date,
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/regulations', $filename); // Store in storage/app/public/regulations

            $regulationData['file'] = $filename;
        }

        Regulation::create($regulationData);

        return redirect()->route('regulations.index')
            ->with('message', 'Regulation created successfully.')
            ->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Regulation $regulation): View
    {
        return view('regulations.show', compact('regulation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regulation $regulation): View
    {
        $fileUrl = $regulation->file
            ? (Storage::disk('public')->exists('regulations/' . $regulation->file)
                ? Storage::url('regulations/' . $regulation->file)
                : null)
            : null;

        return view('regulations.form', compact('regulation', 'fileUrl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regulation $regulation): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'date'  => 'required|date',
            'file'  => 'nullable|mimes:pdf|max:2048', // Validate PDF file, max 2MB
        ]);

        $regulationData = [
            'title' => $request->title,
            'date'  => $request->date,
        ];

        if ($request->hasFile('file')) {
            // Delete old file if it exists
            if ($regulation->file && Storage::disk('public')->exists('regulations/' . $regulation->file)) {
                Storage::disk('public')->delete('regulations/' . $regulation->file);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/regulations', $filename); // Store in storage/app/public/regulations

            $regulationData['file'] = $filename;
        }

        $regulation->update($regulationData);

        return redirect()->route('regulations.index')
            ->with('message', 'Regulation updated successfully.')
            ->with('alert-type', 'success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regulation $regulation): RedirectResponse
    {
        // Delete the file if it exists
        if ($regulation->file && Storage::disk('public')->exists('regulations/' . $regulation->file)) {
            Storage::disk('public')->delete('regulations/' . $regulation->file);
        }

        $regulation->delete();

        return redirect()->route('regulations.index')
            ->with('message', 'Regulation deleted successfully.')
            ->with('alert-type', 'success');
    }
}
