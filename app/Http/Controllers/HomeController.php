<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\News;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $latestNews = News::latest()->take(4)->get();

        $latestNews->each(function ($news) {
            $news->formatted_date = Carbon::parse($news->created_at)->isoFormat('D MMMM Y');
            $news->title = str($news->title)->words(10, '...');
            $news->short_content = str($news->content)->words(25, '...');

            // Check for image existence and use asset() for default image
            if (!$news->photo || !Storage::disk('public')->exists('/images/news/' . $news->photo)) {
                $news->photo = asset('assets/images/logo.jpg'); // Use asset() helper
            } else {
                $news->photo = Storage::url('/images/news/' . $news->photo); // Keep existing logic for uploaded images
            }
        });

        $latestImages = Galeri::latest()->take(10)->get();
        $latestImages->each(function ($image) {
            $image->formatted_date = Carbon::parse($image->tanggal)->isoFormat('D MMMM Y');
            $image->short_description = str($image->deskripsi)->limit(100, '...'); // Customize as needed
        });

        $newsSlides = News::whereNotNull('photo')
            // ->latest()
            ->take(10)
            ->get()
            ->filter(function ($news) {
                return Storage::disk('public')->exists('images/news/' . $news->photo);
            });

        return view('public.pages.index', compact('latestNews', 'latestImages', 'newsSlides'));
    }

    public function newsDetail(News $news): View
    {
        $news->formatted_date = Carbon::parse($news->created_at)->isoFormat('D MMMM Y');

        // Get related news (excluding the current news item)
        $relatedNews = News::where('id', '!=', $news->id)
            ->latest()
            ->take(5) // Get 3 related news items
            ->get();

        $relatedNews->each(function ($item) {
            $item->formatted_date = Carbon::parse($item->created_at)->isoFormat('D MMMM Y');
            $item->title = str($item->title)->words(10, '...');
            $item->short_content = str($item->content)->words(20, '...');

            // Check for image existence and use asset() for default image
            if (!$item->photo || !Storage::disk('public')->exists('images/news/' . $item->photo)) {
                $item->photo = asset('assets/images/logo_blue.png'); // Use asset() helper
            }
        });

        return view('public.pages.news.detail', compact('news', 'relatedNews'));
    }

    public function galeriDetail(Galeri $galeri): View
    {
        $galeri->formatted_date = Carbon::parse($galeri->tanggal)->isoFormat('D MMMM Y');

        // Get related news (excluding the current news item)
        $relatedGaleri = Galeri::where('id', '!=', $galeri->id)
            ->latest()
            ->take(3) // Get 3 related news items
            ->get();

        $relatedGaleri->each(function ($item) {
            $item->formatted_date = Carbon::parse($item->tanggal)->isoFormat('D MMMM Y');
            $item->short_content = str($item->deskripsi)->words(20, '...');
        });

        return view('public.pages.galeri.detail', compact('galeri', 'relatedGaleri'));
    }
}
