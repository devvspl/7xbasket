<?php

namespace App\Http\Controllers;

use App\Models\BlockedIp;
use App\Models\FranchiseApplication;
use App\Services\SeoService;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    // Max submissions per IP per hour before flagging as spam
    const SPAM_LIMIT = 3;

    public function apply()
    {
        $seo = SeoService::get('apply', [
            'title'       => 'Apply for Franchise - 7x Basket',
            'description' => 'Apply now to become a 7x Basket franchise partner. Fill the form and our team will contact you.',
        ]);
        return view('frontend.apply', compact('seo'));
    }

    public function store(Request $request)
    {
        $ip = $request->ip();
        $isAjax = $request->ajax() || $request->wantsJson();

        // ── IP Block check ──────────────────────────────────────────
        if (BlockedIp::where('ip_address', $ip)->exists()) {
            $msg = 'Your access has been restricted. Please contact support.';
            return $isAjax
                ? response()->json(['success' => false, 'message' => $msg], 403)
                : redirect()->route('apply')->with('error', $msg);
        }

        // ── Validation ──────────────────────────────────────────────
        $validated = $request->validate([
            'name'             => 'required|string|max:100',
            'phone'            => 'required|string|max:20',
            'email'            => 'nullable|email|max:150',
            'pincode'          => 'nullable|string|max:10',
            'store_area'       => 'nullable|string|max:50',
            'property_type'    => 'nullable|string|max:50',
            'opening_timeline' => 'nullable|string|max:50',
            // Legacy fields (apply page form)
            'city'             => 'nullable|string|max:100',
            'investment_budget'=> 'nullable|string|max:100',
            'message'          => 'nullable|string|max:1000',
        ]);

        // ── Spam detection: count submissions from this IP in last hour ──
        $recentCount = FranchiseApplication::where('ip_address', $ip)
            ->where('created_at', '>=', now()->subHour())
            ->count();

        $isSpam = $recentCount >= self::SPAM_LIMIT;

        // Auto-block IP if exceeds 2x the limit
        if ($recentCount >= self::SPAM_LIMIT * 2) {
            BlockedIp::firstOrCreate(
                ['ip_address' => $ip],
                ['reason' => 'Auto-blocked: excessive franchise form submissions']
            );
            $msg = 'Too many submissions. Your IP has been blocked.';
            return $isAjax
                ? response()->json(['success' => false, 'message' => $msg], 429)
                : redirect()->route('apply')->with('error', $msg);
        }

        // ── Save ────────────────────────────────────────────────────
        FranchiseApplication::create([
            'name'              => $validated['name'],
            'email'             => $validated['email'] ?? null,
            'phone'             => $validated['phone'],
            'city'              => $validated['city'] ?? null,
            'investment_budget' => $validated['investment_budget'] ?? null,
            'message'           => $validated['message'] ?? null,
            'pincode'           => $validated['pincode'] ?? null,
            'store_area'        => $validated['store_area'] ?? null,
            'property_type'     => $validated['property_type'] ?? null,
            'opening_timeline'  => $validated['opening_timeline'] ?? null,
            'ip_address'        => $ip,
            'source'            => $request->has('pincode') ? 'popup' : 'website',
            'is_spam'           => $isSpam,
            'submission_count'  => $recentCount + 1,
        ]);

        $msg = 'Thank you! Our team will call you within 24 hours.';

        return $isAjax
            ? response()->json(['success' => true, 'message' => $msg])
            : redirect()->route('apply')->with('success', $msg);
    }
}
