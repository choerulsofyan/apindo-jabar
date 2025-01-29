<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class NewsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:BERITA_LIST|BERITA_ADD|BERITA_EDIT|BERITA_DELETE', ['only' => ['index', 'show']]);
        $this->middleware('permission:BERITA_ADD', ['only' => ['create', 'store']]);
        $this->middleware('permission:BERITA_EDIT', ['only' => ['edit', 'update']]);
        $this->middleware('permission:BERITA_DELETE', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $perPage = 20;
        $data = News::orderBy('title', 'asc')->paginate($perPage);
        return view('admin.pages.news.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $imageSrc = asset('assets/images/no-image-available.png');

        return view('admin.pages.news.form', compact('imageSrc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png', // Reduced max size for efficiency
            'place' => 'nullable',
        ]);

        // why we don't define this to be more efficient?
        $newsData = [
            'title' => $request->title,
            'content' => $request->content,
            'place' => $request->place,
        ];

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->scale(800, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $img->toJpeg(75)->save(Storage::disk('public')->path('images/news/' . $filename));

            $newsData = [
                'title' => $request->title,
                'content' => $request->content,
                'photo' => $filename,
                'place' => $request->place,
            ];
        }

        News::create($newsData);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): View
    {
        return view('admin.pages.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        $imageSrc = asset('assets/images/no-image-available.png'); // Default placeholder

        if ($news->photo) {
            if (Storage::disk('public')->exists('images/news/' . $news->photo)) {
                $imageSrc = Storage::url('images/news/' . $news->photo);
            } else {
                $imageSrc = asset('assets/images/image-not-found.png');
            }
        }

        return view('admin.pages.news.form', compact('news', 'imageSrc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png', // Reduced max size for efficiency
            'place' => 'nullable',
        ]);

        $newsData = [
            'title' => $request->title,
            'content' => $request->content,
            'place' => $request->place,
        ];

        if ($request->hasFile('photo')) {
            // Delete old image if it exists
            if ($news->photo && Storage::disk('public')->exists('images/news/' . $news->photo)) {
                Storage::disk('public')->delete('images/news/' . $news->photo);
            }

            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Use ImageManager for Intervention Image 3.x
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image->getRealPath());
            $img->scale(800, 800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Save the new image
            $img->toJpeg(75)->save(Storage::disk('public')->path('images/news/' . $filename));
            $newsData['photo'] = $filename;
        }

        $news->update($newsData);

        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): RedirectResponse
    {
        // Delete the image if it exists
        if ($news->photo && Storage::disk('public')->exists('images/news/' . $news->photo)) {
            Storage::disk('public')->delete('images/news/' . $news->photo);
        }

        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
}
