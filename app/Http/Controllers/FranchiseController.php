<?php

namespace App\Http\Controllers;

use App\Models\BlockedIp;
use App\Models\FranchiseApplication;
use App\Services\SeoService;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    const SPAM_LIMIT = 3;  // flag as spam after 3 submissions/hour
    const BLOCK_LIMIT = 6;  // auto-block IP after 6 submissions/hour

    public function apply()
    {
        $seo = SeoService::get('apply', [
            'title' => 'Apply for Franchise - 7x Basket',
            'description' => 'Apply now to become a 7x Basket franchise partner. Fill the form and our team will contact you.',
        ]);
        return view('frontend.apply', compact('seo'));
    }

    public function landing()
    {
        $seo = SeoService::get('landing', [
            'title' => 'Apply for Franchise - 7x Basket',
            'description' => 'Apply now to become a 7x Basket franchise partner. Fill the form and our team will contact you.',
        ]);
        return view('frontend.landing', compact('seo'));
    }

    public function thankYou()
    {
        $seo = SeoService::get('thank-you', [
            'title' => 'Thank You - 7x Basket',
            'description' => 'Thank you for your interest in 7x Basket franchise. Our team will contact you soon.',
        ]);
        return view('frontend.thank-you', compact('seo'));
    }

    public function store(Request $request)
    {
        $ip = $request->ip();
        $isAjax = $request->ajax() || $request->wantsJson();

        // ── 1. Already blocked? ─────────────────────────────────────
        if (BlockedIp::isBlocked($ip)) {
            return $this->respond($isAjax, false,
                'Your access has been restricted. Please contact support.', 403);
        }

        // ── 2. Validate ─────────────────────────────────────────────
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:2|max:100|regex:/^[\pL\s\-\.]+$/u',
                'phone' => 'required|string|regex:/^[6-9]\d{9}$/',
                'email' => 'nullable|email:rfc|max:150',
                'pincode' => 'nullable|digits:6',
                'store_area' => 'nullable|string|max:50',
                'property_type' => 'nullable|in:owned,rented,leased,looking',
                'opening_timeline' => 'nullable|in:1_month,3_months,6_months,within_a_week,exploring',
                'city' => 'nullable|string|min:2|max:100',
                'investment_budget' => 'nullable|string|max:100',
                'message' => 'nullable|string|max:1000',
                'action_type' => 'nullable|string|in:whatsapp,call,brochure|max:50',
            ], [
                'name.required' => 'Please enter your full name.',
                'name.min' => 'Name must be at least 2 characters.',
                'name.regex' => 'Name should contain only letters, spaces, hyphens or dots.',
                'phone.required' => 'Please enter your mobile number.',
                'phone.regex' => 'Enter a valid 10-digit Indian mobile number (starting with 6–9).',
                'email.email' => 'Please enter a valid email address.',
                'pincode.digits' => 'Pincode must be exactly 6 digits.',
                'property_type.in' => 'Please select a valid property ownership type.',
                'opening_timeline.in' => 'Please select a valid opening timeline.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($isAjax) {
                $first = collect($e->errors())->flatten()->first();
                return response()->json(['success' => false, 'message' => $first], 422);
            }
            throw $e;
        }

        // ── 3. Count recent submissions from this IP ─────────────────
        $recentCount = FranchiseApplication::where('ip_address', $ip)
            ->where('created_at', '>=', now()->subHour())
            ->count();

        // ── 4. Auto-block if over hard limit (1 month expiry) ────────
        if ($recentCount >= self::BLOCK_LIMIT) {
            BlockedIp::firstOrCreate(
                ['ip_address' => $ip],
                [
                    'reason' => 'Auto-blocked: excessive franchise form submissions',
                    'is_active' => true,
                    'expires_at' => now()->addMonth(),
                ]
            );
            return $this->respond($isAjax, false,
                'Too many submissions detected. Your IP has been blocked for 1 month. Contact support if this is a mistake.', 429);
        }

        // ── 5. Soft spam flag ────────────────────────────────────────
        $isSpam = $recentCount >= self::SPAM_LIMIT;

        // ── 6. Analytics: device & page info ────────────────────────
        $ua = $request->userAgent() ?? '';
        $deviceType = $this->detectDevice($ua);
        $referer = $request->headers->get('referer', '');
        $pageUrl = $request->headers->get('x-page-url', $referer);  // JS can send this header

        // ── 7. Source ────────────────────────────────────────────────
        $source = $request->input('source', 'website');

        // ── 8. Save ──────────────────────────────────────────────────
        FranchiseApplication::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'],
            'city' => $validated['city'] ?? null,
            'investment_budget' => $validated['investment_budget'] ?? null,
            'message' => $validated['message'] ?? null,
            'pincode' => $validated['pincode'] ?? null,
            'store_area' => $validated['store_area'] ?? null,
            'property_type' => $validated['property_type'] ?? null,
            'opening_timeline' => $validated['opening_timeline'] ?? null,
            'ip_address' => $ip,
            'source' => $source,
            'action_type' => $validated['action_type'] ?? null,
            'is_spam' => $isSpam,
            'submission_count' => $recentCount + 1,
            'device_type' => $deviceType,
            'user_agent' => substr($ua, 0, 500),
            'page_url' => substr($pageUrl, 0, 500),
            'referer_url' => substr($referer, 0, 500),
        ]);

        // ── 9. Response ──────────────────────────────────────────────
        if ($isSpam) {
            return $this->respond($isAjax, true,
                'Your enquiry was received. Please note that multiple submissions have been detected from your connection.');
        }

        return $this->respond($isAjax, true,
            'Thank you! Our team will call you within 24 hours.');
    }

    private function detectDevice(string $ua): string
    {
        $ua = strtolower($ua);
        if (str_contains($ua, 'mobile') || str_contains($ua, 'android') || str_contains($ua, 'iphone')) {
            return 'mobile';
        }
        if (str_contains($ua, 'tablet') || str_contains($ua, 'ipad')) {
            return 'tablet';
        }
        return 'desktop';
    }

    private function respond(bool $isAjax, bool $success, string $message, int $status = 200)
    {
        if ($isAjax) {
            return response()->json([
                'success' => $success, 
                'message' => $message,
                'redirect' => $success ? route('thank-you') : null
            ], $status);
        }
        
        if ($success) {
            return redirect()->route('thank-you');
        }
        
        $flash = $success ? 'success' : 'error';
        return redirect()->route('apply')->with($flash, $message);
    }
}
