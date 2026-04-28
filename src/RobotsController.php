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

            foreach (config('robots.agents', []) as $agent => $agentRules) {
                $lines[] = '';
                $lines[] = 'User-agent: ' . $agent;
                foreach ($agentRules as $directive => $path) {
                    $lines[] = ucfirst($directive) . ': ' . $path;
                }
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
