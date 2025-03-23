<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $data = Testimoni::latest()->paginate(10);
        return view('admin.pages.testimoni.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.pages.testimoni.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimoni = new Testimoni();
        $testimoni->nama = $request->nama;
        $testimoni->jenis_pekerjaan = $request->jenis_pekerjaan;
        $testimoni->deskripsi = $request->deskripsi;
        $testimoni->save();

        return redirect()->route('mindo.testimoni.index')->with([
            'message' => 'Testimoni created successfully.',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimoni $testimoni): View
    {
        return view('admin.pages.testimoni.show', compact('testimoni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimoni $testimoni): View
    {
        return view('admin.pages.testimoni.form', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimoni $testimoni): RedirectResponse
    {
        $testimoni->nama = $request->nama;
        $testimoni->jenis_pekerjaan = $request->jenis_pekerjaan;
        $testimoni->deskripsi = $request->deskripsi;
        $testimoni->save();

        return redirect()->route('mindo.testimoni.index')->with([
            'message' => 'Testimoni updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $testimoni): RedirectResponse
    {
        $testimoni->delete();

        return redirect()->route('mindo.testimoni.index')->with([
            'message' => 'Testimoni deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
