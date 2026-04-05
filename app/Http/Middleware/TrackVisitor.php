<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track GET requests for HTML pages
        if ($request->isMethod('GET') && !$request->ajax() && !$request->is('admin/*')) {
            $ua = $request->userAgent() ?? '';
            Visitor::create([
                'ip_address' => $request->ip(),
                'page'       => $request->path(),
                'user_agent' => substr($ua, 0, 255),
                'device'     => $this->detectDevice($ua),
                'browser'    => $this->detectBrowser($ua),
            ]);
        }

        return $response;
    }

    private function detectDevice(string $ua): string
    {
        if (preg_match('/Mobile|Android|iPhone/i', $ua)) return 'Mobile';
        if (preg_match('/Tablet|iPad/i', $ua)) return 'Tablet';
        return 'Desktop';
    }

    private function detectBrowser(string $ua): string
    {
        if (str_contains($ua, 'Chrome')) return 'Chrome';
        if (str_contains($ua, 'Firefox')) return 'Firefox';
        if (str_contains($ua, 'Safari')) return 'Safari';
        if (str_contains($ua, 'Edge')) return 'Edge';
        return 'Other';
    }
}
