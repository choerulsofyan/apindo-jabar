<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;
use App\Models\OrganizationalPosition;
use App\Models\Sector;
use App\Models\Council;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ManagementController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:KEPENGURUSAN_LIST|KEPENGURUSAN_ADD|KEPENGURUSAN_EDIT|KEPENGURUSAN_DELETE', ['only' => ['index', 'show']]);
        $this->middleware('permission:KEPENGURUSAN_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:KEPENGURUSAN_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:KEPENGURUSAN_DELETE', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $data = Management::latest()->paginate(5);
        return view('managements.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $imageSrc = asset('assets/images/no-image-available.png');
        $organizationalPositions = OrganizationalPosition::pluck('name', 'id')->all();
        $sectors = Sector::pluck('name', 'id')->all();
        $councils = Council::pluck('name', 'id')->all();

        return view('managements.form', compact('imageSrc', 'organizationalPositions', 'sectors', 'councils'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'member_number' => 'required|unique:management,member_number',
            'name' => 'required',
            'company' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png',
            'status' => 'boolean',
            'organizational_position_id' => 'nullable|exists:organizational_positions,id',
            'sector_id' => 'nullable|exists:sectors,id',
            'council_id' => 'nullable|exists:councils,id',
        ]);

        $managementData = $request->except('photo');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->scale(800, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->toJpeg(75)->save(Storage::disk('public')->path('images/management/' . $filename));

            $managementData['photo'] = 'images/management/' . $filename;
        }

        Management::create($managementData);

        return redirect()->route('managements.index')
            ->with('message', 'Management created successfully.')
            ->with('alert-type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Management $management): View
    {
        return view('managements.show', compact('management'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Management $management): View
    {
        $imageSrc = $management->photo
            ? (Storage::disk('public')->exists($management->photo)
                ? Storage::url($management->photo)
                : asset('assets/images/image-not-found.png'))
            : asset('assets/images/no-image-available.png');

        $organizationalPositions = OrganizationalPosition::pluck('name', 'id')->all();
        $sectors = Sector::pluck('name', 'id')->all();
        $councils = Council::pluck('name', 'id')->all();

        return view('managements.form', compact('management', 'imageSrc', 'organizationalPositions', 'sectors', 'councils'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Management $management): RedirectResponse
    {
        $request->validate([
            'member_number' => 'required|unique:management,member_number,' . $management->id,
            'name' => 'required',
            'company' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png',
            'status' => 'boolean',
            'organizational_position_id' => 'nullable|exists:organizational_positions,id',
            'sector_id' => 'nullable|exists:sectors,id',
            'council_id' => 'nullable|exists:councils,id',
        ]);

        $managementData = $request->except('photo');

        if ($request->hasFile('photo')) {
            // Delete old image if it exists
            if ($management->photo && Storage::disk('public')->exists($management->photo)) {
                Storage::disk('public')->delete($management->photo);
            }

            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->scale(800, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->toJpeg(75)->save(Storage::disk('public')->path('images/management/' . $filename));

            $managementData['photo'] = 'images/management/' . $filename;
        }

        $management->update($managementData);

        return redirect()->route('managements.index')
            ->with('message', 'Management updated successfully.')
            ->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Management $management): RedirectResponse
    {
        if ($management->photo && Storage::disk('public')->exists($management->photo)) {
            Storage::disk('public')->delete($management->photo);
        }

        $management->delete();

        return redirect()->route('managements.index')
            ->with('message', 'Management deleted successfully.')
            ->with('alert-type', 'success');
    }
}
