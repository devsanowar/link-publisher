<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\VisitorLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class VisitorLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');
        $now = Carbon::now();

        // ব্রাউজার ডিটেকশন (সহজ পদ্ধতি)
        $browser = $this->detectBrowser($userAgent);

        // আগের ভিজিট যেখানে left_at নাই সেটি নিয়ে আসো (অর্থাৎ session চলছে)
        $lastVisit = VisitorLog::where('ip_address', $ip)
                        ->whereNull('left_at')
                        ->latest('visited_at')
                        ->first();

        if (!$lastVisit) {
            // নতুন ভিজিট লগ তৈরি করো
            VisitorLog::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'browser' => $browser,
                'visited_at' => $now,
            ]);
        }
        // যদি আগের ভিজিট থেকে left_at null থাকে, তাহলে নতুন রিকোয়েস্টে duration আপডেট করবো terminate এ

        return $next($request);
    }

    public function terminate($request, $response)
    {
        $ip = $request->ip();
        $now = Carbon::now();

        $lastVisit = VisitorLog::where('ip_address', $ip)
                        ->whereNull('left_at')
                        ->latest('visited_at')
                        ->first();

        if ($lastVisit) {
            $duration = $now->diffInSeconds($lastVisit->visited_at);
            $lastVisit->update([
                'left_at' => $now,
                'duration_seconds' => $duration,
            ]);
        }
    }

    private function detectBrowser($userAgent)
    {
        if (strpos($userAgent, 'Chrome') !== false && strpos($userAgent, 'Edg') === false) {
            return 'Google Chrome';
        } elseif (strpos($userAgent, 'Firefox') !== false) {
            return 'Mozilla Firefox';
        } elseif (strpos($userAgent, 'Safari') !== false && strpos($userAgent, 'Chrome') === false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Edg') !== false) {
            return 'Microsoft Edge';
        } elseif (strpos($userAgent, 'Opera') !== false || strpos($userAgent, 'OPR') !== false) {
            return 'Opera';
        } else {
            return 'Others';
        }
    }
}
