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
        
        $query = Regulation::query();
        
        // Search by title
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhereDate('date', 'like', '%' . $search . '%');
            });
        }
        
        // Sort by title (default) or date
        $sortBy = $request->input('sort_by', 'title'); // Default sort by title
        $sortOrder = $request->input('sort_order', 'asc'); // Default sort order
        
        // Validate sort column
        if (!in_array($sortBy, ['title', 'date'])) {
            $sortBy = 'title'; // Default sort column if invalid value is provided
        }
        
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc'; // Default sort order if invalid value is provided
        }
        
        $query->orderBy($sortBy, $sortOrder);
        
        $data = $query->paginate($perPage);
        
        return view('admin.pages.regulations.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $fileUrl = null;

        return view('admin.pages.regulations.form', compact('fileUrl'));
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

        return redirect()->route('mindo.regulations.index')
            ->with('message', 'Regulation created successfully.')
            ->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Regulation $regulation): View
    {
        return view('admin.pages.regulations.show', compact('regulation'));
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

        return view('admin.pages.regulations.form', compact('regulation', 'fileUrl'));
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

        return redirect()->route('mindo.regulations.index')
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

        return redirect()->route('mindo.regulations.index')
            ->with('message', 'Regulation deleted successfully.')
            ->with('alert-type', 'success');
    }
}
