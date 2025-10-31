<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptimizeResponse
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Skip optimization for non-HTML responses and admin panel
        if (
            ! $response instanceof Response ||
            str_starts_with($request->path(), 'admin') ||
            str_starts_with($request->path(), 'filament')
        ) {
            return $response;
        }

        // Add performance headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Add caching headers for static content
        if ($this->isStaticAsset($request)) {
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
        } else {
            // For HTML pages, set reasonable cache control
            $response->headers->set('Cache-Control', 'public, max-age=3600, must-revalidate');
        }

        // Minify HTML in production
        if (app()->environment('production') && $response->headers->get('Content-Type') === 'text/html; charset=UTF-8') {
            $content = $response->getContent();
            if ($content !== false) {
                $minified = $this->minifyHtml($content);
                $response->setContent($minified);
            }
        }

        return $response;
    }

    /**
     * Check if request is for a static asset.
     */
    protected function isStaticAsset(Request $request): bool
    {
        $path = $request->path();
        $extensions = ['css', 'js', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'woff', 'woff2', 'ttf', 'eot', 'ico'];

        foreach ($extensions as $ext) {
            if (str_ends_with($path, '.'.$ext)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Minify HTML content.
     */
    protected function minifyHtml(string $html): string
    {
        // Remove HTML comments (except IE conditional comments)
        $html = preg_replace('/<!--(?!\[if)(?!<!)[^\[>]*(?<!])-->/s', '', $html);

        // Remove whitespace between tags
        $html = preg_replace('/>\s+</', '><', $html);

        // Remove multiple spaces
        $html = preg_replace('/\s+/', ' ', $html);

        return trim($html);
    }
}
