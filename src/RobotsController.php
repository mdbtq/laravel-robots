<?php

namespace Mdbtq\Robots;

use Illuminate\Http\Response;

class RobotsController
{
    public function __invoke(): Response
    {
        $lines = ['User-agent: *'];

        if (config('robots.block_non_production', true) && ! app()->environment('production')) {
            $lines[] = 'Disallow: /';
        } else {
            foreach (config('robots.disallow', []) as $path) {
                $lines[] = 'Disallow: ' . $path;
            }

            $sitemap = config('robots.sitemap');
            if ($sitemap) {
                $lines[] = '';
                $lines[] = 'Sitemap: ' . url($sitemap);
            }
        }

        return response(implode("\n", $lines) . "\n", 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
