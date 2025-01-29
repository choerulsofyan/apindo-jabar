<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:GALERI_LIST|GALERI_ADD|GALERI_EDIT|GALERI_DELETE', ['only' => ['index', 'show']]);
        $this->middleware('permission:GALERI_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:GALERI_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:GALERI_DELETE', ['only' => ['destroy']]);
    }

    public function index(Request $request): View
    {
        $data = Galeri::latest()->paginate(5);
        return view('galeri.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $imageSrc = asset('assets/images/no-image-available.png');

        return view('galeri.form', compact('imageSrc'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $image = $request->file('photo');
        $image_name = time() . '.' . $image->extension();
        $image->storeAs('public/images/galeri/', $image_name);

        $galeri = new Galeri();
        $galeri->tanggal = $request->tanggal;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->file = $image_name;
        $galeri->save();

        return redirect()->route('galeri.index')->with([
            'message' => 'Galeri created successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Galeri $galeri): View
    {
        $imageSrc = asset('storage/images/galeri/' . $galeri->file);

        return view('galeri.form', compact('galeri', 'imageSrc'));
    }

    public function update(Request $request, Galeri $galeri): RedirectResponse
    {
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $image = $request->file('photo');
            $image_name = time() . '.' . $image->extension();
            $image->storeAs('public/images/galeri/', $image_name);
            Storage::delete('public/images/galeri/' . $galeri->file);
            $galeri->file = $image_name;
        }

        $galeri->tanggal = $request->tanggal;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        return redirect()->route('galeri.index')->with([
            'message' => 'Galeri updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(Galeri $galeri): RedirectResponse
    {
        Storage::delete('public/images/galeri/' . $galeri->file);
        $galeri->delete();

        return redirect()->route('galeri.index')->with([
            'message' => 'Galeri deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
