<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\FranchiseApplication;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVisitors    = Visitor::count();
        $totalInquiries   = FranchiseApplication::count();
        $totalBlogs       = Blog::count();
        $pendingInquiries = FranchiseApplication::where('status', 'pending')->count();

        // Monthly visits for chart (last 6 months)
        $monthlyVisits = Visitor::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Monthly inquiries
        $monthlyInquiries = FranchiseApplication::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw('count(*) as total')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Top pages
        $topPages = Visitor::select('page', DB::raw('count(*) as visits'))
            ->groupBy('page')
            ->orderByDesc('visits')
            ->take(5)
            ->get();

        // Device breakdown
        $devices = Visitor::select('device', DB::raw('count(*) as total'))
            ->groupBy('device')
            ->get();

        return view('admin.dashboard', compact(
            'totalVisitors', 'totalInquiries', 'totalBlogs', 'pendingInquiries',
            'monthlyVisits', 'monthlyInquiries', 'topPages', 'devices'
        ));
    }
}
