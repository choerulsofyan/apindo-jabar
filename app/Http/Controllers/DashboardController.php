<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\News;
use App\Models\Pesan;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics.
     */
    public function index(): View
    {
        // Member statistics
        $totalExtraordinaryMembers = Member::where('is_extraordinary_member', true)->count();
        $totalNonExtraordinaryMembers = Member::where('is_extraordinary_member', false)->count();
        $totalMembers = Member::count();

        // Other statistics
        $totalNews = News::count();
        $totalPesan = Pesan::count();
        $totalActivities = Activity::count();

        return view('admin.pages.dashboard.index', compact(
            'totalExtraordinaryMembers',
            'totalNonExtraordinaryMembers',
            'totalMembers',
            'totalNews',
            'totalPesan',
            'totalActivities'
        ));
    }
}
