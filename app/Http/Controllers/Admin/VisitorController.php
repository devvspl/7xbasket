<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlockedIp;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $query = Visitor::latest();

        if ($request->filled('ip')) {
            $query->where('ip_address', 'like', '%' . $request->ip . '%');
        }
        if ($request->filled('page_filter')) {
            $query->where('page', 'like', '%' . $request->page_filter . '%');
        }

        $visitors = $query->paginate(10)->withQueryString();

        $topPages = Visitor::select('page', DB::raw('count(*) as visits'))
            ->groupBy('page')->orderByDesc('visits')->take(10)->get();

        $devices = Visitor::select('device', DB::raw('count(*) as total'))
            ->groupBy('device')->get();

        // Stats
        $totalVisitors  = Visitor::count();
        $todayVisitors  = Visitor::whereDate('created_at', today())->count();
        $uniqueIps      = Visitor::distinct('ip_address')->count();
        $blockedCount   = BlockedIp::where('is_active', true)->count();

        // Blocked IPs with application info
        $blocked = BlockedIp::latest()->paginate(10, ['*'], 'blocked_page');

        // Enrich visitors with application flag
        $visitorIps = $visitors->pluck('ip_address')->unique();
        $appliedIps = \App\Models\FranchiseApplication::whereIn('ip_address', $visitorIps)
            ->pluck('ip_address')->unique()->flip();

        return view('admin.visitors.index', compact(
            'visitors', 'topPages', 'devices',
            'totalVisitors', 'todayVisitors', 'uniqueIps', 'blockedCount',
            'blocked', 'appliedIps'
        ));
    }

    public function blockedIps()
    {
        return redirect()->route('admin.visitors.index', ['tab' => 'blocked']);
    }

    public function blockIp(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip',
            'reason'     => 'nullable|string|max:255',
        ]);

        BlockedIp::updateOrCreate(
            ['ip_address' => $request->ip_address],
            ['reason' => $request->reason, 'is_active' => true]
        );

        return back()->with('success', 'IP blocked successfully.');
    }

    public function unblockIp(BlockedIp $blockedIp)
    {
        $blockedIp->update(['is_active' => false]);
        return back()->with('success', 'IP unblocked.');
    }

    public function destroyBlockedIp(BlockedIp $blockedIp)
    {
        $blockedIp->delete();
        return back()->with('success', 'Record deleted.');
    }
}
