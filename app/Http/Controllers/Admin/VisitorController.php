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

        $visitors = $query->paginate(30)->withQueryString();

        $topPages = Visitor::select('page', DB::raw('count(*) as visits'))
            ->groupBy('page')->orderByDesc('visits')->take(10)->get();

        $devices = Visitor::select('device', DB::raw('count(*) as total'))
            ->groupBy('device')->get();

        return view('admin.visitors.index', compact('visitors', 'topPages', 'devices'));
    }

    public function blockedIps()
    {
        $blocked = BlockedIp::latest()->paginate(20);
        return view('admin.visitors.blocked', compact('blocked'));
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
