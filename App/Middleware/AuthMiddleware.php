<?php

namespace App\Middleware;

use Closure;
use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ServerRequestInterface;

class AuthMiddleware
{
  public function handle(ServerRequestInterface $request, Closure $next)
  {
    if (isset($_SESSION['USER'])) return $next($request);

    return new RedirectResponse('/');
  }
}