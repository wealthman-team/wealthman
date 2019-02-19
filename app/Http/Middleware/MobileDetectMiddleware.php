<?php

namespace App\Http\Middleware;

use App\Services\MobileDetectManager;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MobileDetectMiddleware
{    /**
     * @var MobileDetectManager
     */
    private $mobileDetectManager;

    public function __construct(MobileDetectManager $mobileDetectManager)
    {
        $this->mobileDetectManager = $mobileDetectManager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var Response $response */
        $response = $next($request);

        if (!$request->cookie(MobileDetectManager::LAYOUT_COOKIE)) {
            $response = $this->mobileDetectManager->setLayoutCookie($response);
            $response = $response->setVary('User-Agent');
        }
        return $response;
    }

}
