<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\News;
use Illuminate\View\View;
use Carbon\Carbon;


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
            $news->short_content = str($news->content)->words(20, '...');
        });

        $latestImages = Galeri::latest()->take(8)->get();
        $latestImages->each(function ($image) {
            $image->formatted_date = Carbon::parse($image->tanggal)->isoFormat('D MMMM Y');
            $image->short_description = str($image->deskripsi)->limit(100, '...'); // Customize as needed
        });

        return view('public.pages.index', compact('latestNews', 'latestImages'));
    }

    public function newsDetail(News $news): View
    {
        $news->formatted_date = Carbon::parse($news->created_at)->isoFormat('D MMMM Y');

        // Get related news (excluding the current news item)
        $relatedNews = News::where('id', '!=', $news->id)
            ->latest()
            ->take(3) // Get 3 related news items
            ->get();

        $relatedNews->each(function ($item) {
            $item->formatted_date = Carbon::parse($item->created_at)->isoFormat('D MMMM Y');
            $item->short_content = str($item->content)->words(20, '...');
        });

        return view('public.pages.news.detail', compact('news', 'relatedNews'));
    }
}
