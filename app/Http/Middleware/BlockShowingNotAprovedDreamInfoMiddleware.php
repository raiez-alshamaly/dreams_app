<?php

namespace App\Http\Middleware;

use App\Enums\DreamStatusEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockShowingNotAprovedDreamInfoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request,  Closure $next): Response
    {
        $parameters = $request->route()->parameters();
        $dream = $parameters["dream"] ?? null;
        if (!$dream) {
            return redirect()->route('start');
        } else if ($dream->status != DreamStatusEnum::APPROVE->value) {

            return redirect()->route('start');
        }

        return $next($request);
    }
}
