<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();

        // Verificar si ya hay un registro reciente de esta IP (últimos 5 minutos)
        $exists = Visitor::where('ip_address', $ip)
            ->where('user_agent', $userAgent)
            ->where('created_at', '>=', Carbon::now()->subMinutes(5))
            ->exists();

        if (!$exists) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
            ]);
        }

        return $next($request);    }
}
