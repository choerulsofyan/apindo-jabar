<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Galeri;
use App\Models\Management;
use App\Models\News;
use App\Models\Regulation;
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
                $news->photo = asset('assets/images/image-placeholder.png'); // Use asset() helper
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

        // dd($newsSlides);

        $newsSlides->each(function ($news) {
            $news->formatted_date = Carbon::parse($news->created_at)->isoFormat('D MMMM Y');
            $news->title = str($news->title)->words(10, '...');
            $news->short_content = str($news->content)->words(25, '...');

            // Check for image existence and use asset() for default image
            // if (!$news->photo || !Storage::disk('public')->exists('/images/news/' . $news->photo)) {
            //     $news->photo = asset('assets/images/image-placeholder.png'); // Use asset() helper
            // } else {
            //     $news->photo = Storage::url('/images/news/' . $news->photo); // Keep existing logic for uploaded images
            // }
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

    public function history(): View
    {
        return view('public.pages.history');
    }

    public function visionMission(): View
    {
        return view('public.pages.vision-mission');
    }

    public function sectors(): View
    {
        return view('public.pages.sectors');
    }

    public function dpkApindoJabar(): View
    {
        $pageTitle = 'DPK APINDO Jabar';
        $dpkData = [
            [
                'city' => 'Kabupaten Bandung',
                'chairman' => 'Wilky Kurniawan',
                'secretary' => 'Ronalson Sihombing, SH.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kab. Bandung Barat',
                'chairman' => 'Ir. Suhendro Limantoro',
                'secretary' => 'Yohan Ibrahim',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Cianjur',
                'chairman' => 'Hadi Permadiboy',
                'secretary' => 'Rahmat Sophian, SE.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Bogor',
                'chairman' => 'Ir. Rizal Supari Abdul Hayi',
                'secretary' => 'Anna Ristiana, S. E',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kota Cimahi',
                'chairman' => 'Drs. Roy Sunarja',
                'secretary' => 'Christina Sri Manunggal, SH.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kota Bandung',
                'chairman' => 'Ahmad Kosim Asmari S.E., M.M',
                'secretary' => 'Drs. Ariawan Wibawa',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Subang',
                'chairman' => 'Asep R. Dimyati, SH. MH.',
                'secretary' => 'Agus Setiawan, SH.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Majalengka',
                'chairman' => 'Dinar Tisnawati, SE.',
                'secretary' => 'Dadang Iskandar',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Sumedang',
                'chairman' => 'Luddy Sutedja, SP',
                'secretary' => 'Sumardi Widjaja',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Bekasi',
                'chairman' => 'H. Sutomo, SH. MMK3L.',
                'secretary' => 'H. Musfir',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Cirebon',
                'chairman' => 'Asep Soleh',
                'secretary' => 'Patuju Kang Wisnu',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Garut',
                'chairman' => 'DR. H. Dody Hermana, MBA.',
                'secretary' => 'Rifa Siti Muthia',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Karawang',
                'chairman' => 'H. Abdul Syukur',
                'secretary' => 'Fuat Dasim',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Purwakarta',
                'chairman' => 'Gatot Prasetyoko, SH.',
                'secretary' => 'Datuk, SE.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Sukabumi',
                'chairman' => 'Sudarno, SH.',
                'secretary' => 'Ujang Supian, SIP.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Tasikmalaya',
                'chairman' => 'Aang Budiana, SAg.',
                'secretary' => 'Fahmi Muzaki, ST.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kota Banjar',
                'chairman' => 'H. Oni Kurnia, SE.',
                'secretary' => 'Mister Agus Wahyudi',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kota Bogor',
                'chairman' => 'Dzulfikar Priyatna',
                'secretary' => 'Hilman Arifa Azhar',
                'executive_secretary' => 'Siswoyo',
            ],
            [
                'city' => 'Kota Sukabumi',
                'chairman' => 'H. Ashady Sugiarto',
                'secretary' => 'Yanti Susanti, SE.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Indramayu',
                'chairman' => 'Duryat Asep, SIP.',
                'secretary' => 'Narman, SE.',
                'executive_secretary' => 'Sri Puspaningsih .S.Hut',
            ],
            [
                'city' => 'Kota Depok',
                'chairman' => 'Wahyu Isnaeni, SE.',
                'secretary' => 'Sri Rahayu',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kota Cirebon',
                'chairman' => 'Agus Subiakto',
                'secretary' => 'Rr. Tati Hartati, SE.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Kuningan',
                'chairman' => 'Emon Surahman, SE. ME.',
                'secretary' => 'Syohibul Pachroj',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Pangandaran',
                'chairman' => 'Ipin Aripin',
                'secretary' => 'Joane Irwan Suwarsa',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kota Bekasi',
                'chairman' => 'Farid Elhakamy',
                'secretary' => 'B. Purnomo, SH. MM.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kabupaten Ciamis',
                'chairman' => 'Ekky R. Bratakusumah',
                'secretary' => 'H. Wikky Hendawan, SH.',
                'executive_secretary' => null,
            ],
            [
                'city' => 'Kota Tasikmalaya',
                'chairman' => 'Teguh Suryaman, SE.',
                'secretary' => 'Reni Nooraeni',
                'executive_secretary' => null,
            ],
        ];

        return view('public.pages.dpk-apindo-jabar', compact('pageTitle', 'dpkData'));
    }

    public function regulations(Request $request): View
    {
        $perPage = 20;

        $query = Regulation::query();

        // Search by title
        if ($search = $request->input('search')) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // Sort by title or date
        $sortBy = $request->input('sort_by', 'date'); // Default sort by date
        $sortOrder = $request->input('sort_order', 'desc'); // Default sort order (descending for date)

        if (!in_array($sortBy, ['title', 'date'])) {
            $sortBy = 'date'; // Default sort column if invalid value is provided
        }

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'desc'; // Default sort order if invalid value is provided
        }

        $query->orderBy($sortBy, $sortOrder);

        $regulations = $query->paginate($perPage);

        return view('public.pages.regulations', compact('regulations', 'perPage'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    public function managements(Request $request): View
    {
        $perPage = 20;

        $query = Management::query();

        // Search by title
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Sort by title or date
        $sortBy = $request->input('sort_by', 'name'); // Default sort by date
        $sortOrder = $request->input('sort_order', 'desc'); // Default sort order (descending for date)

        if (!in_array($sortBy, ['name'])) {
            $sortBy = 'name'; // Default sort column if invalid value is provided
        }

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'desc'; // Default sort order if invalid value is provided
        }

        $query->orderBy($sortBy, $sortOrder);

        $managements = $query->paginate($perPage);

        return view('public.pages.managements', compact('managements', 'perPage'))
            ->with('i', ($request->input('page', 1) - 1) * $perPage);
    }

    public function calendar(): View
    {
        $activities = Activity::all(); // Get *all* activities

        $events = [];
        foreach ($activities as $activity) {
            $events[] = [
                'title' => $activity->title,
                'start' => $activity->start_time->toIso8601String(), // Format for FullCalendar
                'end' => $activity->end_time ? $activity->end_time->toIso8601String() : null, // Handle nullable end_time
                // 'url' => route('activity.show', $activity->slug), // Example - link to a details page
                'extendedProps' => [ //store additional data
                    'place' => $activity->place,
                    'description' => $activity->description
                ]

            ];
        }

        return view('public.pages.calendar', compact('events'));
    }

    // Add show method
    public function activityShow(Activity $activity): View
    {
        return view('public.pages.activity_show', compact('activity'));
    }
}
